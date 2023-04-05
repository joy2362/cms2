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
                v-model="login.email"
                :error="!!errors.email"
                :error-messages="errors.email"
                color="primary"
                density="compact"
                label="Email"
                type="email"
                variant="underlined"
            ></v-text-field>

            <v-text-field
                v-model="login.password"
                :append-icon="login.showPass ? 'mdi-eye' : 'mdi-eye-off'"
                :error="!!errors.password"
                :error-messages="errors.password"
                :type="login.showPass ? 'text' : 'password'"
                color="primary"
                density="compact"
                label="Password"
                variant="underlined"
                @click:append="login.showPass = !login.showPass"
            ></v-text-field>
            <v-list-item :to="{path: '/admin/forget-password'}">Forgot Password?</v-list-item>

          </div>
          <div class="login-button">

            <v-btn
                class="ma-2"
                color="primary"
                type="submit"
            >
              Login
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
import { login } from './js/auth'

export default {
  computed: {
    ...mapWritableState(useAuthStore, { login: 'login', errors: 'errors' }),
    ...mapState(useAuthStore, { getLoginData: 'getLoginData', getLoginUrl: 'getLoginUrl' }),
    ...mapState(useGlobalStore, { getLogo: 'getLogo' })
  },
  methods: {
    ...mapActions(useAuthStore, { authToken: 'setToken', setErrors: 'setErrors', clearLogin: 'clearLogin' }),
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    async submit () {
      await login(this)
    }
  }
}
</script>

<style scoped src="./css/style.css"></style>
