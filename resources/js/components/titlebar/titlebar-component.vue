<template>
  <v-toolbar density="compact" :title="title" color="primary">
    <v-breadcrumbs :items="routes">
      <template v-slot:divider>
        <v-icon icon="mdi-chevron-right"></v-icon>
      </template>
    </v-breadcrumbs>
  </v-toolbar>
</template>

<script>
export default {
  props: ["title", "routes"],
};
</script>

<style></style>
