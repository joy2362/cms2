<template>
  <v-card elevation="4">
    <v-card-title>Password</v-card-title>
    <v-container>
      <v-form @submit.prevent>
        <v-text-field
            label="Old password"
            v-model="oldPassword"
            :append-icon="showOldPassword ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="showOldPassword = !showOldPassword"
            :type="showOldPassword ? 'text' : 'password'"
            :error="!!errors.oldPassword"
            :error-messages="errors.oldPassword"
        ></v-text-field>
        <v-text-field
            label="Password"
            v-model="newPassword"
            :append-icon="showNewPassword ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="showNewPassword = !showNewPassword"
            :type="showNewPassword ? 'text' : 'password'"
            :error="!!errors.newPassword"
            :error-messages="errors.newPassword"
        ></v-text-field>
        <v-text-field
            label="Confirm password"
            v-model="confirmPassword"
            :append-icon="showConfirmPassword ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="showConfirmPassword = !showConfirmPassword"
            :type="showConfirmPassword ? 'text' : 'password'"
            :error="!!errors.confirmPassword"
            :error-messages="errors.confirmPassword"
        ></v-text-field>

        <v-btn type="submit" color="success" class="mt-2">Change</v-btn>
      </v-form>
    </v-container>
  </v-card>
</template>

<script>
import { mapWritableState } from 'pinia'
import { useProfileStore } from '../../stores/profile'

export default {
  name: 'PasswordUpdate',
  data () {
    return {
      showOldPassword: false,
      showNewPassword: false,
      showConfirmPassword: false,
      errors: [],
      loading: false,
    }
  },
  computed: {
    ...mapWritableState(useProfileStore, {
      oldPassword: 'oldPassword',
      newPassword: 'newPassword',
      confirmPassword: 'confirmPassword'
    })
  },

}
</script>

<style>

</style>