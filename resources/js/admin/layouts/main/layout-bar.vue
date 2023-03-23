<template>
  <v-app :theme="getTheme">
    <layoutAppVue></layoutAppVue>
    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>
import layoutAppVue from './layout-app.vue'
import { mapState } from 'pinia'
import { useSettingStore } from '../../stores/setting'

export default {
  components: { layoutAppVue },
  computed: {
    ...mapState(useSettingStore, { getTheme: 'getTheme' }),
  }
}
</script>
