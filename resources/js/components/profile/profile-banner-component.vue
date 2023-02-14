<template>
  <v-card elevation="4">
    <v-container>
        <v-row>
            <v-col lg="3" sm="12" class="d-flex justify-center">
                <v-avatar image="https://randomuser.me/api/portraits/men/85.jpg" size="180"></v-avatar>
            </v-col>
            <v-col lg="6" sm="12" class="align-auto">
                <v-card-title class="text-h3 d-flex justify-center">John Leider</v-card-title>
                <v-card-text class="caption d-flex justify-center">Machine Learning Engineer</v-card-text>
            </v-col>
        </v-row>
        <v-card-action>
            <div class="d-flex justify-center">
                <v-btn append-icon="mdi mdi-github">Github</v-btn>
                <v-btn append-icon="mdi mdi-linkedin">LinkedIn</v-btn>
                <v-btn append-icon="mdi mdi-gmail">Mail</v-btn>
            </div>
        </v-card-action>
    </v-container>
  </v-card>
</template>

<script>
export default {

}
</script>

<style scoped>
.align-auto {
    margin-top: auto;
    margin-bottom: auto;
}
</style>