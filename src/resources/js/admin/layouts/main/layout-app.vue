<template>
  <div>
    <v-navigation-drawer v-model="drawer" permanent>
      <v-list-item
          :prepend-avatar="profile.avatar"
          :title="profile.name"
      >
        <template v-slot:append>
          <v-menu>
            <template v-slot:activator="{ props }">
              <v-btn
                  icon="mdi-chevron-right"
                  v-bind="props"
                  variant="text"
              ></v-btn>
            </template>

            <v-list bg-color="primary" class="list" min-width="200">
              <v-list-item @click="toProfile">
                <v-list-item-title>
                  <v-icon>mdi-account</v-icon>
                  Profile
                </v-list-item-title>
              </v-list-item>

              <v-list-item>
                <v-list-item-title>
                  <v-icon>mdi-cog</v-icon>
                  Setting
                </v-list-item-title>
              </v-list-item>

              <v-list-item>
                <v-list-item-title>
                  <v-icon>mdi-run</v-icon>
                  Activities
                </v-list-item-title>
              </v-list-item>

              <v-list-item @click="logout">
                <v-list-item-title>
                  <v-icon color="red">mdi-power</v-icon>
                  <span class="text-red">Logout</span>
                </v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </template>
      </v-list-item>

      <v-divider></v-divider>

      <v-list v-for="(item, i) in menu" :key="i" density="compact" nav>
        <v-list-item
            v-if="!item.submenu"
            :prepend-icon="item.icon"
            :title="item.title"
            :to="item.url"
        ></v-list-item>

        <v-list-group v-else :key="i">
          <template v-slot:activator="{ props }">
            <v-list-item
                :prepend-icon="item.icon"
                :title="item.title"
                v-bind="props"
            ></v-list-item>
          </template>

          <v-list-item
              v-for="(sub, idx) in item.submenu"
              :key="idx"
              :prepend-icon="sub.icon"
              :title="sub.title"
              :to="sub.url"
              class="item_menu"
          ></v-list-item>
        </v-list-group>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar :elevation="2">
      <template v-slot:prepend>
        <v-app-bar-nav-icon @click.stop="setDrawer"></v-app-bar-nav-icon>
      </template>
      <template v-slot:append>

        <!--        notification     -->
        <v-menu>
          <template v-slot:activator="{ props }">
            <v-btn class="text-none" stacked v-bind="props">
              <v-badge color="error" content="9+">
                <v-icon>mdi-bell</v-icon>
              </v-badge>
            </v-btn>
          </template>
          <v-card min-width="300">
            <v-list>
              <v-list-subheader>Notification</v-list-subheader>
              <v-list-item
                  v-for="(item, i) in notification"
                  :key="i"
                  :subtitle="item.description"
                  :title="item.title"
              >
                <template v-slot:prepend>
                  <v-avatar>
                    <v-img
                        :src="item.avatar"
                        alt="John"
                    ></v-img>
                  </v-avatar>
                </template>
              </v-list-item>
            </v-list>
            <v-card-actions>

              <v-btn
                  color="primary"
                  variant="text"
                  @click="menu = false"
              >
                Mark as read
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-menu>

        <v-btn class="text-none" stacked>
          <v-badge color="error" content="9+">
            <v-icon>mdi-message</v-icon>
          </v-badge>
        </v-btn>

        <v-tooltip text="Theme">
          <template v-slot:activator="{ props }">
            <v-btn :icon="getTheme === 'dark' ?  'mdi-weather-night' : 'mdi-weather-sunny'" v-bind="props"
                   variant="tonal"
                   @click="changeTheme"></v-btn>
          </template>
        </v-tooltip>
      </template>

    </v-app-bar>
  </div>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { useAuthStore } from '../../stores/auth'
import { useProfileStore } from '../../stores/profile'
import { useSettingStore } from '../../stores/setting'
import { changeTheme, logout } from './js/layout'

export default {
  data () {
    return {
      menu: [
        {
          title: 'Dashboard',
          icon: 'mdi-view-dashboard',
          url: '/admin/dashboard',
        },
        {
          title: 'Profile',
          icon: 'mdi-view-dashboard',
          url: '/admin/profile',
        },
        {
          title: 'Message',
          icon: 'mdi-view-dashboard',
          url: '/admin/chat',
        },
        {
          title: 'Role',
          icon: 'mdi-view-dashboard',
          url: '/admin/role',
        },
      ],
      notification: [
        {
          title: 'abdullah zahid',
          description: 'Create a new category',
          avatar: 'https://cdn.vuetifyjs.com/images/john.jpg'
        },
        {
          title: 'abdullah zahid',
          description: 'update a new category',
          avatar: 'https://cdn.vuetifyjs.com/images/john.jpg'
        },
        {
          title: 'abdullah zahid',
          description: 'delete a new category',
          avatar: 'https://cdn.vuetifyjs.com/images/john.jpg'
        }
      ],
    }
  },
  mounted () {
    this.setProfile()
  },
  computed: {
    ...mapState(useProfileStore, { profile: 'getProfile' }),
    ...mapState(useSettingStore, { getTheme: 'getTheme' }),
    ...mapWritableState(useSettingStore, { drawer: 'drawer' })
  },
  methods: {
    ...mapActions(useAuthStore, { logoutFromState: 'removeToken' }),
    ...mapActions(useProfileStore, { setProfile: 'setProfile' }),
    ...mapActions(useSettingStore, { setTheme: 'setTheme', setDrawer: 'setDrawer' }),
    changeTheme () {
      changeTheme(this)
    },
    toProfile () {
      this.$router.push('/admin/profile')
    },
    async logout () {
      await logout(this)
    }
  },
}
</script>

<style scoped src="./css/layout-app.css"></style>
