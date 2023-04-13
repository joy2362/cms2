<template>
  <v-container>
    <TitleBarSection :routes="getCreadeBradecrumb"></TitleBarSection>
    <v-toolbar title="Create role">
      <v-tooltip text="All Role">
        <template v-slot:activator="{ props }">
          <v-btn icon="mdi-eye" to="/admin/role" v-bind="props" variant="tonal"></v-btn>
        </template>
      </v-tooltip>
    </v-toolbar>
    <v-card elevation="4">
      <v-container>
        <v-text-field label="Name"></v-text-field>
        <v-text-field label="Name"></v-text-field>
        <div class="my-btn">
          <v-btn color="primary" variant="tonal"> Save</v-btn>
          <v-btn color="red" variant="tonal"> Cancel</v-btn>
        </div>
      </v-container>
    </v-card>
  </v-container>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { useAdminRoleStore } from '../../stores/role'
import TitleBarSection from '../../components/titlebar/TitleBarSection.vue'

export default {
  name: 'admin.store',
  components: { TitleBarSection },
  methods: {
    ...mapActions(useAdminRoleStore, {
      setBradcrumb: 'setBradcrumb',
    }),
  },
  computed: {
    ...mapState(useAdminRoleStore, {
      getAllRole: 'getAllRole',
      getCreadeBradecrumb: 'getCreadeBradecrumb',
    }),
  },
  mounted () {
    this.setBradcrumb()
  }
}
</script>

<style scoped>
</style>