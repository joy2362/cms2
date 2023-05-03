<template>
  <v-container>
    <BreadCrumb :routes="getBreadcrumb"></BreadCrumb>
    <TitleBar :route="getRoutes.create" :title="getRoutes.index.name"></TitleBar>
    <DataTable :columns='getData.columns' :rows='getData.data' :total="getData.total"
               title="Role" @search="search"/>
  </v-container>
</template>

<script>
import FooterSection from '../../components/footer/FooterSection.vue'
import { mapActions, mapState } from 'pinia'
import { useAdminRoleStore } from '../../stores/role'
import { useDataTableStore } from '../../stores/dataTable'
import BreadCrumb from '../../components/common/BreadCrumb.vue'
import TitleBar from '../../components/common/TitleBar.vue'
import DataTable from '../../components/common/DataTable.vue'
import { getRoles } from '../../js/role'

export default {
  name: 'admin.index',
  components: { DataTable, TitleBar, BreadCrumb, FooterSection },
  methods: {
    ...mapActions(useAdminRoleStore, {
      setData: 'setData',
      setBradCrumb: 'setBradCrumb',
    }),
    async search () {
      await getRoles(this, this.getSearch)
    },
  },
  computed: {
    ...mapState(useAdminRoleStore, {
      getData: 'getData',
      getBreadcrumb: 'getBreadcrumb',
      getRoutes: 'getRoutes',
      getApiRoutes: 'getApiRoutes',
    }),
    ...mapState(useDataTableStore, {
      getSearch: 'getSearch',
    }),
  },
  mounted () {
    this.setBradCrumb()
    this.search()
  }
}
</script>

<style scoped>

</style>