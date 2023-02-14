<template>
  <v-card elevation="4">
    <v-card-title>Danger Alert</v-card-title>
    <v-container>
        <v-alert
            closable
            title="Alert title"
            type="error"
            class="mb"
        ></v-alert>

        <v-alert
            closable
            title="Alert title"
            type="error"
            variant="outlined"
            class="mb"
        ></v-alert>

        <v-alert
            closable
            title="Alert title"
            type="error"
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