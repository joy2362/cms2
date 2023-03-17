<template>
  <v-container>
    <TitleBarSection :routes="routes"></TitleBarSection>
    <DataTable :columns='tableColumns1' :rows='tableRows1'
               title="Role">admin role
    </DataTable>
  </v-container>
</template>

<script>
import DataTable from '../../components/data-table/index.vue'
import TitleBarSection from '../../components/titlebar/TitleBarSection.vue'
import FooterSection from '../../components/footer/FooterSection.vue'

export default {
  name: 'adminIndex',
  components: { FooterSection, TitleBarSection, DataTable },
  data: () => ({
    routes: [
      {
        title: 'Dashboard',
        disabled: false,
        href: '/admin/dashboard',
      },
      {
        title: 'Role',
        disabled: true,
        href: '',
      },
    ],
    tableRows1: [
      {
        firstName: 'Bill',
        lastName: 'Gates',
        company: 'Microsoft',
        city: 'Seattle',
      },
      {
        firstName: 'Steve',
        lastName: 'Jobs',
        company: 'Apple',
        city: 'San Francisco',
      },
      {
        firstName: 'Larry',
        lastName: 'Page',
        company: 'Google',
        city: 'East Lansing',
      },
      {
        firstName: 'Mark',
        lastName: 'Zuckerberg',
        company: 'Facebook',
        city: 'White Plains',
      },
    ],
    tableColumns1: [
      {
        label: 'First name',
        field: 'firstName',
        sortable: true,
      },
      {
        label: 'Last Name',
        field: 'lastName',
        sortable: true,
      },
      {
        label: 'Company',
        field: 'company',
        sortable: true,
      },
      {
        label: 'City',
        field: 'city',
        sortable: true,
      },
    ],
  }),
}
</script>

<style scoped>

</style>