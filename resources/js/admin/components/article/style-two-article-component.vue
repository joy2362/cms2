<template>
  <v-card elevation="4">
    <v-card-title>News Title</v-card-title>
    <v-card-subtitle>Jakarta, 28 Desember 2022</v-card-subtitle>
    <v-img
      src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
      height="200px"
      cover
    ></v-img>
    <v-card-text>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima, at placeat totam, magni doloremque veniam neque porro libero rerum unde voluptatem!</v-card-text>
    <div class="px-4">
      <v-chip-group v-model="selection">
        <v-chip>News</v-chip>

        <v-chip>Economy</v-chip>

        <v-chip>Stock</v-chip>

        <v-chip>Prediction</v-chip>
      </v-chip-group>
    </div>

    <v-card-actions>
      <v-btn
        color="deep-purple-lighten-2"
        variant="text"
        @click="reserve"
      >
        Read More
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {

}
</script>

<style>

</style>