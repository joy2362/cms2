import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => {
    return {
      token: localStorage.getItem('token') ?? '',
      login: {
        email: '',
        password: '',
      },
      resetPassword: {
        email: '',
        token: '',
        password: '',
        confirmPassword: '',
      },
      showBtn: {
        loginPass: false,
        resetPass: false,
        resetConfirmPass: false,
      },
      apiRoutes: {
        login: '/api/admin/login',
        logout: '/api/admin/logout',
        forgetPassword: '/api/admin/forget-password',
        resetPassword: '/api/admin/password-reset',
      },
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
      return {
        token: state.resetPassword.token,
        email: state.resetPassword.email,
        password: state.resetPassword.password,
        confirmPassword: state.resetPassword.confirmPassword,
      }
    },
    getApiRoutes (state) {
      return state.apiRoutes
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
      this.login.email = ''
      this.login.password = ''
    },
    clearForgetPassword () {
      this.resetPassword.email = ''
      this.resetPassword.token = ''
      this.resetPassword.password = ''
      this.resetPassword.confirmPassword = ''
    },
    setResetPasswordTokenAndEmail (payload) {
      this.resetPassword.token = payload.token
      this.resetPassword.email = payload.email
    }
  }
})
