<template>
  <v-card elevation="4">
    <v-card-title>General</v-card-title>
    <v-container>
      <v-form @submit.prevent>
        <v-text-field
            v-model="name"
            label="Name"
        ></v-text-field>
        <v-text-field
            v-model="email"
            label="email"
        ></v-text-field>

        <v-btn type="submit" color="success" class="mt-2">Submit</v-btn>
      </v-form>
    </v-container>
  </v-card>
</template>

<script>
import { mapWritableState } from 'pinia'
import { useProfileStore } from '../../stores/profile'
export default {
  name: "ProfileUpdate",
  computed: {
    ...mapWritableState(useProfileStore, { name: 'name' , email: 'email' })
  },
}
</script>

<style>

</style>