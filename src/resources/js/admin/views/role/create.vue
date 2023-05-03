<template>
  <v-container>
    <GlobalLoading/>
    <BreadCrumb :routes="getBreadcrumb"></BreadCrumb>
    <TitleBar :route="getRoutes.index" :title="$route.params.id ? 'Update Role': 'Create Role'"></TitleBar>
    <v-card>
      <v-card-text>
        <v-text-field v-model="singleData.name" label="Name"></v-text-field>
        <div class="text-caption mb-2">Permissions:</div>
        <template v-for="(permissions , index) in getPermissions" :key="index">
          <v-item-group v-model="singleData.permissions" class="my-4" multiple selected-class="bg-primary">
            <div class="text-caption mb-2">{{ index }}</div>
            <v-item
                v-for="permission in permissions"
                :key="permission.id"
                v-slot="{ selectedClass, toggle }"
                :value="permission.id"
            >
              <v-chip
                  class="mx-1"
                  :class="selectedClass"
                  @click="toggleItem(permission.id)"
              >
                {{ permission.title }}
              </v-chip>
            </v-item>
          </v-item-group>
        </template>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" variant="tonal" @click="submit"> Save</v-btn>
        </v-card-actions>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { useAdminRoleStore } from '../../stores/role'
import TitleBar from '../../components/common/TitleBar.vue'
import BreadCrumb from '../../components/common/BreadCrumb.vue'
import { createRole, getPermissions, getSingleData, updateRole } from '../../js/role'
import { useGlobalStore } from '../../stores/global'

export default {
  name: 'admin.store',
  components: { BreadCrumb, TitleBar },
  methods: {
    ...mapActions(useAdminRoleStore, {
      setBradCrumb: 'setBradCrumb',
      setPermissions: 'setPermissions',
      setSingleData: 'setSingleData',
    }),
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    async init () {
      this.setGlobalLoading(true)
      await getPermissions(this)
      if (this.$route.params.id) {
        await getSingleData(this, this.$route.params.id)
      }
      this.setGlobalLoading(false)
    },
    async submit () {
      if (this.$route.params.id) {
        await updateRole(this, this.$route.params.id)
      } else {
        await createRole(this)
      }
    },
    toggleItem (id) {
      let found = this.singleData.permissions.find(element => element === id)
      if (!found) {
        this.singleData.permissions.push(id)
      } else {
        let index = this.singleData.permissions.findIndex(element => element === id)
        this.singleData.permissions.splice(index, 1)
      }
    }
  },
  computed: {
    ...mapState(useAdminRoleStore, {
      getPermissions: 'getPermissions',
      getBreadcrumb: 'getBreadcrumb',
      getRoutes: 'getRoutes',
      getApiRoutes: 'getApiRoutes',
      getSingleData: 'getSingleData',
    }),
    ...mapWritableState(useAdminRoleStore, {
      singleData: 'singleData'
    }),
  },
  mounted () {
    this.setBradCrumb(this.$route.params.id ? 'update' : 'create')
    this.init()
  }
}
</script>

<style scoped>
</style>