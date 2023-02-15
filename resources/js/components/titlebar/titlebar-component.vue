<template>
    <v-breadcrumbs :items="routes">
      <template v-slot:divider>
        <v-icon icon="mdi-chevron-right"></v-icon>
      </template>
    </v-breadcrumbs>
</template>

<script>
export default {
  props: ["title", "routes"],
};
</script>

<style></style>
