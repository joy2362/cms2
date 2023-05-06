<template>
  <v-card elevation="4">
    <v-card-title>Password</v-card-title>
    <v-container>
      <v-form @submit.prevent="submit">
        <v-text-field
            v-model="form.oldPassword"
            :append-icon="showBtn.old ? 'mdi-eye' : 'mdi-eye-off'"
            :error="!!errors.password.oldPassword"
            :error-messages="errors.password.oldPassword"
            :type="showBtn.old ? 'text' : 'password'"
            label="Old password"
            @click:append="showBtn.old = !showBtn.old"
        ></v-text-field>
        <v-text-field
            v-model="form.newPassword"
            :append-icon="showBtn.new ? 'mdi-eye' : 'mdi-eye-off'"
            :error="!!errors.password.newPassword"
            :error-messages="errors.password.newPassword"
            :type="showBtn.new ? 'text' : 'password'"
            label="Password"
            @click:append="showBtn.new = !showBtn.new"
        ></v-text-field>
        <v-text-field
            v-model="form.confirmPassword"
            :append-icon="showBtn.confirm ? 'mdi-eye' : 'mdi-eye-off'"
            :error="!!errors.password.confirmPassword"
            :error-messages="errors.password.confirmPassword"
            :type="showBtn.confirm ? 'text' : 'password'"
            label="Confirm password"
            @click:append="showBtn.confirm = !showBtn.confirm"
        ></v-text-field>

        <v-btn class="mt-2" color="success" type="submit">Change</v-btn>
      </v-form>
    </v-container>
  </v-card>
</template>

<script>
import { mapWritableState, mapState, mapActions } from 'pinia'
import { useProfileStore } from '../../stores/profile'
import { useGlobalStore } from '../../stores/global'
import { passwordUpdate } from '../../js/profile'

export default {
  name: 'PasswordUpdate',
  computed: {
    ...mapWritableState(useProfileStore, {
      form: 'form', errors: 'errors', showBtn: 'showBtn'
    }),
    ...mapState(useProfileStore, { getPasswordForm: 'getPasswordForm', getApiRoutes: 'getApiRoutes' })
  },

  methods: {
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    ...mapActions(useProfileStore, { setPasswordForm: 'setPasswordForm' }),

    async submit () {
      await passwordUpdate(this)
    }
  }

}
</script>

<style>

</style>