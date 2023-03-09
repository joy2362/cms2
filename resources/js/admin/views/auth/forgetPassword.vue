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
                v-model="resetPassword.email"
                :error="!!errors.email"
                :error-messages="errors.email"
                color="primary"
                density="compact"
                label="Email"
                type="email"
                variant="underlined"
            ></v-text-field>

          </div>
          <div class="login-button">
            <v-btn
                class="ma-2"
                color="primary"
                type="submit"
            >
              Send Instructions
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
import { forgetPassword } from './js/auth'

export default {
  name: 'ForgetPassword',
  computed: {
    ...mapWritableState(useAuthStore, { resetPassword: 'resetPassword', errors: 'errors' }),
    ...mapState(useAuthStore, { getForgetPassData: 'getForgetPassData', getForgetPasswordUrl: 'getForgetPasswordUrl' }),
    ...mapState(useGlobalStore, { getLogo: 'getLogo' })
  },
  methods: {
    ...mapActions(useAuthStore, { setErrors: 'setErrors', clearForgetPassword: 'clearForgetPassword' }),
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    async submit () {
      await forgetPassword(this)
    }
  }
}
</script>

<style scoped>

.main-bg {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  padding: 120px 0;
}

.card-login {
  width: 600px;
}

@media screen and (max-width: 450px) {
  .card-login {
    width: 80%;
  }
}

.login-logo {
  width: 270px;
  height: auto;
}

@media screen and (max-width: 450px) {
  .login-logo {
    width: 150px;
  }
}

.form-login {
  width: 80%;
  margin: auto;
}

.login-button {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 50px;
  margin-bottom: 35px;
}
</style>
