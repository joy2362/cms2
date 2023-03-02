<template>
  <v-card elevation="4">
    <v-card-title>Password</v-card-title>
    <v-container>
      <v-form @submit.prevent="submit">
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
import { mapWritableState, mapState, mapActions } from 'pinia'
import { useProfileStore } from '../../stores/profile'

const url = 'profile/password'
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
    }),
    ...mapState(useProfileStore, { getPasswordForm: 'getPasswordForm' })
  },

  methods: {
    ...mapActions(useProfileStore, { resetPasswordForm: 'resetPasswordForm' }),

    async submit () {
      const res = await this.$post(url, this.getPasswordForm)
      if (res.data?.success) {
        this.$success(res.data.message)
        this.resetPasswordForm()
        this.errors = []
      }
      if (res.errors?.error) {
        this.$error(res.errors?.error)
      }
      if (res.errors?.errors) {
        this.errors = res.errors?.errors
      }
    }
  }

}
</script>

<style>

</style>