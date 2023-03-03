<template>
  <v-app :theme="theme">
    <GlobalLoading/>
    <div class="main-bg">

      <v-card
          elevation="2"
          class="card-login"
      >
        <v-card-title class="d-flex justify-center">
          <img :src="getLogo" class="login-logo" alt="Logo">
        </v-card-title>

        <v-form
            @submit.prevent="submit"
            class="form-width"
        >

          <div class="form-login">
            <v-text-field
                label="Email"
                density="compact"
                variant="underlined"
                color="primary"
                v-model="login.email"
                type="email"
                :error="!!errors.email"
                :error-messages="errors.email"
                @keydown.enter="submit()"
            ></v-text-field>

            <v-text-field
                density="compact"
                variant="underlined"
                color="primary"
                label="Password"
                v-model="login.password"
                :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
                @click:append="showPass = !showPass"
                :type="showPass ? 'text' : 'password'"
                :error="!!errors.password"
                :error-messages="errors.password"
                @keydown.enter="submit()"
            ></v-text-field>
          </div>
          <div class="login-button">
            <v-btn
                type="submit"
                class="ma-2"
                color="primary"
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
  data () {
    return {
      showPass: false,
      theme: localStorage.getItem('theme')
    }
  },
  computed: {
    ...mapWritableState(useAuthStore, { login: 'login', errors: 'errors' }),
    ...mapState(useAuthStore, { getLoginData: 'getLoginData' }),
    ...mapState(useGlobalStore, { getLogo: 'getLogo' })
  },
  methods: {
    ...mapActions(useAuthStore, { authToken: 'setToken', setErrors: 'setErrors', clearLogin: 'clearLogin' }),
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
    async submit () {
      await login(this)
    }
  },
  mounted () {
    this.auth = useAuthStore()
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
