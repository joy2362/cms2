<template>
  <v-app>
    <GlobalLoading/>
    <div class="main-bg">

      <v-card
          class="card-login"
          elevation="2"
      >
        <v-card-title class="d-flex justify-center">
          <img :src="getLogo" alt="Logo" class="login-logo">
        </v-card-title>

        <v-form
            class="form-width"
            @submit.prevent="submit"
        >

          <div class="form-login">
            <v-text-field
                v-model="resetPassword.password"
                :append-icon="resetPassword.showPass ? 'mdi-eye' : 'mdi-eye-off'"
                :error="!!errors.password"
                :error-messages="errors.password"
                :type="resetPassword.showPass ? 'text' : 'password'"
                color="primary"
                density="compact"
                label="Password"
                variant="underlined"
                @click:append="resetPassword.showPass = !resetPassword.showPass"
            ></v-text-field>
            <v-text-field
                v-model="resetPassword.confirmPassword"
                :append-icon="resetPassword.showConfirmPass ? 'mdi-eye' : 'mdi-eye-off'"
                :error="!!errors.confirmPassword"
                :error-messages="errors.confirmPassword"
                :type="resetPassword.showConfirmPass ? 'text' : 'password'"
                color="primary"
                density="compact"
                label="Confirm password"
                variant="underlined"
                @click:append="resetPassword.showConfirmPass = !resetPassword.showConfirmPass"
            ></v-text-field>

          </div>
          <div class="login-button">
            <v-btn
                class="ma-2"
                color="primary"
                type="submit"
            >
              Reset
            </v-btn>
          </div>
        </v-form>
      </v-card>
    </div>
  </v-app>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { useAuthStore } from '../../stores/auth'
import { useGlobalStore } from '../../stores/global'
import { resetPassword } from './js/auth'

export default {
  name: 'passwordReset',
  mounted () {
    const data = { 'token': this.$route.params.token, 'email': this.$route.params.email }
    this.setResetPasswordTokenAndEmail(data)
  },
  computed: {
    ...mapWritableState(useAuthStore, { resetPassword: 'resetPassword', errors: 'errors' }),
    ...mapState(useAuthStore, { getResetPassData: 'getResetPassData', getResetPasswordUrl: 'getResetPasswordUrl' }),
    ...mapState(useGlobalStore, { getLogo: 'getLogo' })
  },
  methods: {
    ...mapActions(useAuthStore, {
      setErrors: 'setErrors',
      clearForgetPassword: 'clearForgetPassword',
      setResetPasswordTokenAndEmail: 'setResetPasswordTokenAndEmail'
    }),
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    async submit () {
      await resetPassword(this)
    }
  }
}
</script>

<style scoped src="./css/style.css"></style>