<template>
  <div>
    <v-navigation-drawer v-model="drawer" temporary color="primary">
      <v-list-item
        prepend-avatar="https://randomuser.me/api/portraits/men/78.jpg"
        title="John Leider"
      >
        <template v-slot:append>
          <v-menu>
            <template v-slot:activator="{ props }">
              <v-btn
                variant="text"
                icon="mdi-chevron-right"
                v-bind="props"
              ></v-btn>
            </template>

            <v-list min-width="200" class="list">
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

              <v-list-item>
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

      <v-list density="compact" nav v-for="(item, i) in menu" :key="i">
        <v-list-item
          :prepend-icon="item.icon"
          :title="item.title"
          :to="item.url"
          v-if="!item.submenu"
        ></v-list-item>

        <v-list-group v-else :key="i">
          <template v-slot:activator="{ props }">
            <v-list-item
              v-bind="props"
              :prepend-icon="item.icon"
              :title="item.title"
            ></v-list-item>
          </template>

          <v-list-item
            class="item_menu"
            v-for="(sub, idx) in item.submenu"
            :key="idx"
            :title="sub.title"
            :prepend-icon="sub.icon"
            :to="sub.url"
          ></v-list-item>
        </v-list-group>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar :elevation="2">
      <template v-slot:prepend>
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      </template>
      <template v-slot:append>
        <v-btn class="text-none" stacked>
          <v-badge content="9+" color="error">
            <v-icon>mdi-bell</v-icon>
          </v-badge>
        </v-btn>

        <v-btn class="text-none" stacked>
          <v-badge content="9+" color="error">
            <v-icon>mdi-message</v-icon>
          </v-badge>
        </v-btn>
        <v-btn :prepend-icon="icon" @click="onClick"></v-btn>
      </template>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      drawer: null,
      menu: [
        {
          title: "Dashboard",
          icon: "mdi-view-dashboard",
          url: "/",
        },
      ],
      icon: "",
      is_night: null,
    };
  },
  mounted() {
    this.getIcon();
  },
  methods: {
    onClick() {
      this.$emit("tema");
      this.is_night = !this.is_night;
      if (this.is_night === true) {
        this.icon = "mdi mdi-weather-night";
      } else {
        this.icon = "mdi mdi-weather-sunny";
      }
      localStorage.setItem("icon", this.icon);
    },

    toProfile() {
      this.$router.push("/profile");
    },

    getIcon() {
      if (localStorage.getItem("theme") === "dark") {
        this.is_night = true;
        this.icon = "mdi mdi-weather-sunny";
      } else {
        this.is_night = false;
        this.icon = "mdi mdi-weather-night";
      }
    },
  },
};
</script>

<style scoped>
.list {
  cursor: pointer;
}

.item_menu {
  padding-left: 0;
  margin-left: -25px;
}
</style>
