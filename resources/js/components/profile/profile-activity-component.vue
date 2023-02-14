<template>
  <v-card elevation="4">
    <v-card-title>Activities</v-card-title>
    <v-container>
        <v-timeline side="end" density="compact">
            <v-timeline-item dot-color="primary">
                <template v-slot:opposite>
                    Opposite content
                </template>
                <div>
                    <div class="text-h6">Content title</div>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </v-timeline-item>

            <v-timeline-item dot-color="success">
                <template v-slot:opposite>
                    Opposite content
                </template>
                <div>
                    <div class="text-h6">Content title</div>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </v-timeline-item>

            <v-timeline-item dot-color="info">
                <template v-slot:opposite>
                    Opposite content
                </template>
                <div>
                    <div class="text-h6">Content title</div>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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