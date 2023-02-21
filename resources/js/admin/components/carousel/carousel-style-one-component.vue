<template>
  <v-carousel
    cycle
    height="400"
    delimiter-icon="mdi-star-four-points"
    hide-delimiter-background
    show-arrows="hover"
  >
    <v-carousel-item
      v-for="(slide, i) in slides"
      :key="i"
    >
      <v-sheet
        :color="colors[i]"
        height="100%"
      >
        <div class="d-flex fill-height justify-center align-center">
          <div class="text-h2">
            {{ slide }} Slide
          </div>
        </div>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>
</template>

<script>
export default {
    data () {
      return {
        colors: [
          'red',
          'green',
          'blue',
          'yellow',
          'purple',
        ],
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ],
      }
    },
}
</script>

<style>

</style>