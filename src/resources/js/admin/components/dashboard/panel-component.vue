<template>
  <v-card elevation="4">
    <v-card-title class="text">
      <v-icon>{{ icon }}</v-icon>
      {{ title }}
    </v-card-title>
    <div class="text-center">
      <h3 class="text-h5">{{ value }}</h3>
    </div>
  </v-card>
</template>

<script>
export default {
  props: ['icon', 'title', 'value']
}
</script>

<style>

</style>
