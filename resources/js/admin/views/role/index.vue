<template>
  <v-container>
    <TitleBarSection :routes="getBreadcrumb"></TitleBarSection>
    <DataTable :columns='getColumns' :rows='getAllRole' :total="getTotal"
               title="Role" @search="search"/>
  </v-container>
</template>

<script>
import DataTable from '../../components/data-table/index.vue'
import TitleBarSection from '../../components/titlebar/TitleBarSection.vue'
import FooterSection from '../../components/footer/FooterSection.vue'
import { mapActions, mapState } from 'pinia'
import { useAdminRoleStore } from '../../stores/role'
import { useDataTableStore } from '../../stores/dataTable'

export default {
  name: 'adminIndex',
  components: { FooterSection, TitleBarSection, DataTable },
  methods: {
    ...mapActions(useAdminRoleStore, {
      setAllRole: 'setAllRole',
    }),
    search () {
      this.setAllRole(this.getSearch)
    }
  },
  computed: {
    ...mapState(useAdminRoleStore, {
      getAllRole: 'getAllRole',
      getColumns: 'getColumns',
      getBreadcrumb: 'getBreadcrumb',
      getTotal: 'getTotal',
    }),
    ...mapState(useDataTableStore, {
      getSearch: 'getSearch',
    }),
  },
  mounted () {
    this.setAllRole(this.getSearch)
  }
}
</script>

<style scoped>

</style>