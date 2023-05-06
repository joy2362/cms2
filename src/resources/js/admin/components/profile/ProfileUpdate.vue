<template>
  <v-card elevation="4">
    <v-card-title>General</v-card-title>
    <v-container>
      <v-form @submit.prevent="submit">
        <v-text-field
            v-model="form.name"
            :error="!!errors.general.name"
            :error-messages="errors.general.name"
            label="Name"
        ></v-text-field>
        <v-text-field
            v-model="form.email"
            :error="!!errors.general.email"
            :error-messages="errors.general.email"
            label="email"
        ></v-text-field>

        <v-btn class="mt-2" color="success" type="submit">Update</v-btn>
      </v-form>
    </v-container>
  </v-card>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { useProfileStore } from '../../stores/profile'
import { useGlobalStore } from '../../stores/global'
import { generalUpdate } from '../../js/profile'

export default {
  name: 'ProfileUpdate',
  computed: {
    ...mapWritableState(useProfileStore, { form: 'form', errors: 'errors' }),
    ...mapState(useProfileStore, { getGeneralForm: 'getGeneralForm', getApiRoutes: 'getApiRoutes' })
  },
  methods: {
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    ...mapActions(useProfileStore, { setProfile: 'setProfile', setGeneralForm: 'setGeneralForm' }),

    async submit () {
      await generalUpdate(this)
    }
  }
}
</script>

<style>

</style>