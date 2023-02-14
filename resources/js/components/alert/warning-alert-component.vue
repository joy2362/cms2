<template>
  <v-card elevation="4">
    <v-card-title>Warning Alert</v-card-title>
    <v-container>
        <v-alert
            closable
            title="Alert title"
            type="warning"
            class="mb"
        ></v-alert>

        <v-alert
            closable
            title="Alert title"
            type="warning"
            variant="outlined"
            class="mb"
        ></v-alert>

        <v-alert
            closable
            title="Alert title"
            type="warning"
            variant="tonal"
            class="mb"
        ></v-alert>
    </v-container>
  </v-card>
</template>

<script>
export default {

}
</script>

<style scoped>
.mb {
    margin-bottom: 15px;
}
</style>