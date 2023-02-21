<template>
  <div>
    <div class="chord">
        <p>Secret</p>
    </div>
    <v-card
        elevation="4"
    >
        <v-img
            class="align-end text-white"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            cover
        >
            <v-card-title class="text-center text-h5">News Title</v-card-title>
        </v-img>

        <v-card-subtitle class="pt-4">
            Jakarta, 28 Desember 2022
        </v-card-subtitle>

        <v-card-text>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima, at placeat totam, magni doloremque veniam neque porro libero rerum unde voluptatem!</div>
        </v-card-text>

        <v-card-actions>
        <v-btn color="info">
            Share
        </v-btn>

        <v-btn color="info">
            Read More
        </v-btn>
        </v-card-actions>
    </v-card>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.chord {
    background-color: rgb(56, 114, 164);
    width: 120px;
    height: 35px;
    position: absolute;
    z-index: 99;
    margin-left: -50px;
}
.chord p {
    color: white;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}
</style>