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
                :append-icon="showBtn.loginPass ? 'mdi-eye' : 'mdi-eye-off'"
                :error="!!errors.password"
                :error-messages="errors.password"
                :type="showBtn.loginPass ? 'text' : 'password'"
                color="primary"
                density="compact"
                label="Password"
                variant="underlined"
                @click:append="showBtn.loginPass = !showBtn.loginPass"
            ></v-text-field>
            <v-btn :to="{path: '/admin/forget-password'}" plain>Forgot Password?</v-btn>
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
import { login } from '../../js/auth'

export default {
  computed: {
    ...mapWritableState(useAuthStore, { login: 'login', errors: 'errors', showBtn: 'showBtn' }),
    ...mapState(useAuthStore, {
      getLoginData: 'getLoginData',
      getApiRoutes: 'getApiRoutes'
    }),
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

<style scoped src="../../styles/auth.css"></style>
