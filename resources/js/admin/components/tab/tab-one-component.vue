<template>
  <v-card elevation="4">
    <v-tabs
      v-model="tab"
      bg-color="primary"
    >
      <v-tab value="one">Item One</v-tab>
      <v-tab value="two">Item Two</v-tab>
      <v-tab value="three">Item Three</v-tab>
    </v-tabs>

    <v-card-text>
      <v-window v-model="tab">
        <v-window-item value="one">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consequuntur autem quaerat magni doloremque. Pariatur fugiat rerum recusandae ipsa impedit quas. Ipsum illo, at nulla natus accusamus architecto ducimus sequi.
        </v-window-item>

        <v-window-item value="two">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam facere magni deleniti sequi aliquid accusantium excepturi! Harum perspiciatis expedita ex quibusdam sit nam, iusto ducimus sunt, repellat reprehenderit ratione id.
        </v-window-item>

        <v-window-item value="three">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque necessitatibus id animi commodi ducimus unde modi vitae eos, maxime magni exercitationem iusto quaerat, nulla quasi quae a, vel blanditiis quidem.
        </v-window-item>
      </v-window>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
    data: () => ({
      tab: null,
    }),
}
</script>

<style>

</style>