<template>
  <v-container>
    <GlobalLoading/>
    <BreadCrumb :routes="getBreadcrumb"></BreadCrumb>
    <TitleBar :route="getRoutes.index" title="View Role"></TitleBar>
    <v-card :title="getSingleData.name">
      <v-card-text>
        <div class="mb-2">Permissions:</div>
        <template v-for="(permissions , index) in getPermissions" :key="index">
          <v-item-group v-model="getSingleData.permissions" class="my-4" disabled multiple selected-class="bg-primary">
            <div class="text-caption mb-2">{{ index }}</div>
            <v-item
                v-for="permission in permissions"
                :key="permission.id"
                v-slot="{ selectedClass, toggle }"
                :value="permission.id"
            >
              <v-chip
                  :class="selectedClass"
                  class="mx-1"
              >
                {{ permission.title }}
              </v-chip>
            </v-item>
          </v-item-group>
        </template>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { useAdminRoleStore } from '../../stores/role'
import BreadCrumb from '../../components/common/BreadCrumb.vue'
import TitleBar from '../../components/common/TitleBar.vue'
import { useGlobalStore } from '../../stores/global'
import { getPermissions, getSingleData } from '../../js/role'

export default {
  name: 'show',
  components: { TitleBar, BreadCrumb },
  computed: {
    ...mapState(useAdminRoleStore, {
      getPermissions: 'getPermissions',
      getBreadcrumb: 'getBreadcrumb',
      getRoutes: 'getRoutes',
      getApiRoutes: 'getApiRoutes',
      getSingleData: 'getSingleData',
    }),
  },
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
      await getSingleData(this, this.$route.params.id)
      this.setGlobalLoading(false)
    },
  },
  mounted () {
    this.setBradCrumb('show')
    this.init()
  }
}
</script>

<style scoped>

</style>