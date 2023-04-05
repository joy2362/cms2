<template>
  <v-container>
    <v-card elevation="4">
      <v-container>
        <v-text-field label="First Name"></v-text-field>
        <v-text-field label="Last Name"></v-text-field>
        <v-textarea label="Description"></v-textarea>
        <div class="my-btn">
          <v-btn color="primary" variant="tonal">
            Save
          </v-btn>
          <v-btn color="red" variant="tonal">
            Cancel
          </v-btn>
        </div>
      </v-container>
    </v-card>
  </v-container>
</template>

<script>
export default {
  name: 'adminCreate'
}
</script>

<style scoped>

</style>