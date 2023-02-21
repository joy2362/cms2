<template>
  <v-card elevation="4">
    <v-card-title>User Data</v-card-title>
    <v-container>
        <v-timeline side="end" density="compact">
            <v-timeline-item dot-color="primary">
                <div>
                    <div class="text-h6">Email</div>
                    <p>
                        johnleider@gmail.com
                    </p>
                </div>
            </v-timeline-item>

            <v-timeline-item dot-color="success">
                <div>
                    <div class="text-h6">Gender</div>
                    <p>
                        Male
                    </p>
                </div>
            </v-timeline-item>

            <v-timeline-item dot-color="info">
                <div>
                    <div class="text-h6">Hobbies</div>
                    <p>
                        Sleeping, Coding, Playing
                    </p>
                </div>
            </v-timeline-item>
        </v-timeline>
    </v-container>
  </v-card>
</template>

<script>
export default {

}
</script>

<style>

</style>