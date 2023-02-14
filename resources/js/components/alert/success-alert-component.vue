<template>
  <v-card elevation="4">
    <v-card-title>Success Alert</v-card-title>
    <v-container>
        <v-alert
            closable
            title="Alert title"
            type="success"
            class="mb"
        ></v-alert>

        <v-alert
            closable
            title="Alert title"
            type="success"
            variant="outlined"
            class="mb"
        ></v-alert>

        <v-alert
            closable
            title="Alert title"
            type="success"
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