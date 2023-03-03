<template>
  <v-card elevation="4">
    <v-card-title>General</v-card-title>
    <v-container>
      <v-form @submit.prevent="submit">
        <v-text-field
            v-model="general.name"
            label="Name"
            :error="!!generalErrors.name"
            :error-messages="generalErrors.name"
        ></v-text-field>
        <v-text-field
            v-model="general.email"
            label="email"
            :error="!!generalErrors.email"
            :error-messages="generalErrors.email"
        ></v-text-field>

        <v-btn type="submit" color="success" class="mt-2">Update</v-btn>
      </v-form>
    </v-container>
  </v-card>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { useProfileStore } from '../../stores/profile'
import { useGlobalStore } from '../../stores/global'
import { generalUpdate } from './js/profile'

export default {
  name: 'ProfileUpdate',
  computed: {
    ...mapWritableState(useProfileStore, { general: 'general', generalErrors: 'generalErrors' }),
    ...mapState(useProfileStore, { getGeneralProfile: 'getGeneralProfile', getGeneralUpdateUrl: 'getGeneralUpdateUrl' })
  },
  methods: {
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    ...mapActions(useProfileStore, { setProfile: 'setProfile', resetGeneralForm: 'resetGeneralForm' }),

    async submit () {
      await generalUpdate(this)
    }
  }
}
</script>

<style>

</style>