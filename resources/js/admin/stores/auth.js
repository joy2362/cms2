import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => {
    return {
      token: localStorage.getItem('token') ?? '',
      login: {
        email: '',
        password: '',
        showPass: false
      },
      resetPassword: {
        email: '',
        password: '',
        confirmPassword: '',
        showPass: false,
        showConfirmPass: false,
      },
      loginUrl: '/api/admin/login',
      errors: [],
    }
  },
  getters: {
    getToken (state) {
      return state.token
    },
    getLoginData (state) {
      return state.login
    },
    getForgetPassData (state) {
      return { email: state.resetPassword.email }
    },
    getResetPassData (state) {
      return { email: state.resetPassword.email }
    },
    getLoginUrl (state) {
      return state.loginUrl
    },
    getErrors (state) {
      return state.errors
    }
  },
  actions: {
    setToken (token) {
      localStorage.setItem('token', token)
    },
    removeToken () {
      localStorage.removeItem('token')
    },
    setErrors (payload = []) {
      this.errors = payload
    },
    clearLogin () {
      this.login = {
        email: '',
        password: '',
        showPass: false
      }
    }
  }
})
