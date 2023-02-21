<template>
  <v-card elevation="4">
    <v-tabs
        fixed-tabs
        bg-color="primary"
        v-model="tab"
    >
        <v-tab value="one">
            Option
        </v-tab>
        <v-tab value="two">
            Another Option
        </v-tab>
    </v-tabs>

    <v-card-text>
      <v-window v-model="tab">
        <v-window-item value="one">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consequuntur autem quaerat magni doloremque. Pariatur fugiat rerum recusandae ipsa impedit quas. Ipsum illo, at nulla natus accusamus architecto ducimus sequi.
        </v-window-item>

        <v-window-item value="two">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam facere magni deleniti sequi aliquid accusantium excepturi! Harum perspiciatis expedita ex quibusdam sit nam, iusto ducimus sunt, repellat reprehenderit ratione id.
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