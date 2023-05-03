<template>
  <v-app :theme="getTheme">
    <layoutAppVue></layoutAppVue>
    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>
import layoutAppVue from './main/layout-app.vue'
import { mapState } from 'pinia'
import { useSettingStore } from '../stores/setting'

export default {
  name: 'LayoutMain',
  components: { layoutAppVue },
  computed: {
    ...mapState(useSettingStore, { getTheme: 'getTheme' }),
  }
}
</script>

<style scoped>

</style>