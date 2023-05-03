<template>
  <v-toolbar :title="title">
    <v-tooltip :text="route.name">
      <template v-slot:activator="{ props }">
        <v-btn :icon="route.icon" :to="route.to" v-bind="props" variant="tonal"></v-btn>
      </template>
    </v-tooltip>
  </v-toolbar>
</template>

<script>
export default {
  name: 'TitleBar',
  props: ['title', 'route'],
}
</script>

<style scoped>

</style>