<template>
  <v-toolbar :title="title">
    <v-tooltip v-if="route" :text="route.name">
      <template v-slot:activator="{ props }">
        <v-btn :icon="route.icon" :to="route.to" v-bind="props" variant="tonal"></v-btn>
      </template>
    </v-tooltip>
  </v-toolbar>
</template>

<script>
export default {
  name: 'TitleBar',
  props: {
    title: {
      type: String,
      required: true,
    },
    route: {
      type: Array,
      required: false,
    },
  }

}
</script>

<style scoped>

</style>