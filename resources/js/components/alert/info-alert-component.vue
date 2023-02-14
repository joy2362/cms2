<template>
  <v-card elevation="4">
    <v-card-title>Info Alert</v-card-title>
    <v-container>
        <v-alert
            closable
            title="Alert title"
            type="info"
            class="mb"
        ></v-alert>

        <v-alert
            closable
            title="Alert title"
            type="info"
            variant="outlined"
            class="mb"
        ></v-alert>

        <v-alert
            closable
            title="Alert title"
            type="info"
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