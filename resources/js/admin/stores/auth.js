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
        token: '',
        password: '',
        confirmPassword: '',
        showPass: false,
        showConfirmPass: false,
      },
      loginUrl: '/api/admin/login',
      forgetPasswordUrl: '/api/admin/forget-password',
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
        password: state.resetPassword.password,
        confirmPassword: state.resetPassword.confirmPassword,
      }
    },
    getLoginUrl (state) {
      return state.loginUrl
    },
    getForgetPasswordUrl (state) {
      return state.forgetPasswordUrl
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
    },
    clearForgetPassword () {
      this.resetPassword = {
        email: '',
        token: '',
        password: '',
        confirmPassword: '',
        showPass: false,
        showConfirmPass: false,
      }
    },
    setResetPasswordToken (payload) {
      this.resetPassword.token = payload
    }

  }
})
