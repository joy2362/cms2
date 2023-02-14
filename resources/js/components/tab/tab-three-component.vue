<template>
  <v-card elevation="4">
    <v-tabs
      v-model="tab"
      bg-color="primary"
      center-active
    >
      <v-tab value="one">One</v-tab>
      <v-tab value="two">Two</v-tab>
      <v-tab value="three">Three</v-tab>
      <v-tab value="four">Four</v-tab>
      <v-tab value="five">Five</v-tab>
      <v-tab value="six">Six</v-tab>
      <v-tab value="seven">Seven</v-tab>
      <v-tab value="eight">Eight</v-tab>
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
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis adipisci repudiandae, eveniet quia natus excepturi cupiditate nam sunt alias, eum deserunt earum dicta. Distinctio autem nostrum ut rerum esse praesentium.
        </v-window-item>

        <v-window-item value="four">
         Lorem, ipsum dolor sit amet consectetur adipisicing elit. Optio, necessitatibus? Reprehenderit nulla eveniet beatae, repellendus quia soluta magni excepturi, fugit fugiat placeat cum molestiae modi. Aspernatur sit impedit facilis facere!
        </v-window-item>

        <v-window-item value="five">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam aliquam architecto nesciunt facilis, nam laudantium numquam molestias voluptatem molestiae maiores, libero cumque possimus laborum porro expedita et, velit adipisci incidunt.
        </v-window-item>

        <v-window-item value="six">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam aliquam architecto nesciunt facilis, nam laudantium numquam molestias voluptatem molestiae maiores, libero cumque possimus laborum porro expedita et, velit adipisci incidunt.
        </v-window-item>

        <v-window-item value="seven">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam aliquam architecto nesciunt facilis, nam laudantium numquam molestias voluptatem molestiae maiores, libero cumque possimus laborum porro expedita et, velit adipisci incidunt.
        </v-window-item>

        <v-window-item value="eight">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam aliquam architecto nesciunt facilis, nam laudantium numquam molestias voluptatem molestiae maiores, libero cumque possimus laborum porro expedita et, velit adipisci incidunt.
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