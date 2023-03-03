<template>
  <v-card elevation="4">
    <v-card-title>Password</v-card-title>
    <v-container>
      <v-form @submit.prevent="submit">
        <v-text-field
            label="Old password"
            v-model="password.oldPassword"
            :append-icon="password.showOldPassword ? 'mdi-eye' : 'mdi-eye-off'"
            :error="!!passwordErrors.oldPassword"
            :error-messages="passwordErrors.oldPassword"
            :type="password.showOldPassword ? 'text' : 'password'"
            @click:append="password.showOldPassword = !password.showOldPassword"
        ></v-text-field>
        <v-text-field
            label="Password"
            v-model="password.newPassword"
            :append-icon="password.showNewPassword ? 'mdi-eye' : 'mdi-eye-off'"
            :error="!!passwordErrors.newPassword"
            :error-messages="passwordErrors.newPassword"
            :type="password.showNewPassword ? 'text' : 'password'"
            @click:append="password.showNewPassword = !password.showNewPassword"
        ></v-text-field>
        <v-text-field
            label="Confirm password"
            v-model="password.confirmPassword"
            :append-icon="password.showConfirmPassword ? 'mdi-eye' : 'mdi-eye-off'"
            :error="!!passwordErrors.confirmPassword"
            :error-messages="passwordErrors.confirmPassword"
            :type="password.showConfirmPassword ? 'text' : 'password'"
            @click:append="password.showConfirmPassword = !password.showConfirmPassword"
        ></v-text-field>

        <v-btn type="submit" color="success" class="mt-2">Change</v-btn>
      </v-form>
    </v-container>
  </v-card>
</template>

<script>
import { mapWritableState, mapState, mapActions } from 'pinia'
import { useProfileStore } from '../../stores/profile'
import { useGlobalStore } from '../../stores/global'
import { passwordUpdate } from './js/profile'

export default {
  name: 'PasswordUpdate',
  computed: {
    ...mapWritableState(useProfileStore, {
      password: 'password', passwordErrors: 'passwordErrors'
    }),
    ...mapState(useProfileStore, { getPasswordForm: 'getPasswordForm', getPasswordUpdateUrl: 'getPasswordUpdateUrl' })
  },

  methods: {
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    ...mapActions(useProfileStore, { resetPasswordForm: 'resetPasswordForm' }),

    async submit () {
      await passwordUpdate(this)
    }
  }

}
</script>

<style>

</style>