<template>
  <v-card elevation="4">
    <v-card-title>Initial Avatar</v-card-title>
    <v-component>
        <div class="d-flex align-center justify-space-around mb">
            <v-avatar color="primary" size="160">
                <span class="text-h2">WA</span>
            </v-avatar>
            <v-avatar color="primary" size="120">
                <span class="text-h3">WA</span>
            </v-avatar>
            <v-avatar color="primary" size="80">
                <span class="text-h5">WA</span>
            </v-avatar>
            <v-avatar color="primary" size="40">
                <span class="text-caption">WA</span>
            </v-avatar>
        </div>
    </v-component>
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