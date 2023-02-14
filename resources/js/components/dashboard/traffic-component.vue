<template>
  <v-card elevation="4">
    <v-card-title>Reference Traffict</v-card-title>
    <v-list>
        <v-list-item>
            <v-list-item-title>Google</v-list-item-title>
            <v-progress-linear color="primary" model-value="70"></v-progress-linear>
        </v-list-item>
        <v-list-item>
            <v-list-item-title>Amazone</v-list-item-title>
            <v-progress-linear color="primary" model-value="50"></v-progress-linear>
        </v-list-item>
        <v-list-item>
            <v-list-item-title>Bing</v-list-item-title>
            <v-progress-linear color="primary" model-value="40"></v-progress-linear>
        </v-list-item>
        <v-list-item>
            <v-list-item-title>Facebook</v-list-item-title>
            <v-progress-linear color="primary" model-value="60"></v-progress-linear>
        </v-list-item>
    </v-list>
  </v-card>
</template>

<script>
export default {

}
</script>

<style>

</style>