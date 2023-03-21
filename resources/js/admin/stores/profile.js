import { defineStore } from 'pinia'

export const useProfileStore = defineStore('profile', {
  state: () => {
    return {
      profile: [],
      general: {
        name: '',
        email: '',
      },
      avatar: '',
      password: {
        oldPassword: '',
        newPassword: '',
        confirmPassword: '',
        showOldPassword: false,
        showNewPassword: false,
        showConfirmPassword: false,
      },
      passwordErrors: [],
      generalErrors: [],
      passwordUpdateUrl: 'profile/password',
      generalUpdateUrl: 'profile/general',
    }
  },
  getters: {
    getProfile (state) {
      return state.profile
    },
    getGeneralProfile (state) {
      return state.general
    },
    getPasswordForm (state) {
      return {
        oldPassword: state.password.oldPassword,
        newPassword: state.password.newPassword,
        confirmPassword: state.password.confirmPassword,
      }
    },
    getPasswordErrors (state) {
      return state.passwordErrors
    },
    getPasswordUpdateUrl (state) {
      return state.passwordUpdateUrl
    },
    getGeneralErrors (state) {
      return state.generalErrors
    },
    getGeneralUpdateUrl (state) {
      return state.generalUpdateUrl
    }
  },
  actions: {
    setProfile () {
      const token = localStorage.getItem('token')
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        }
      }
      axios.get('/api/admin/profile', config).then(res => {
        this.profile = res.data.profile ?? []
        this.general = {
          name: res.data.profile.name ?? '',
          email: res.data.profile.email ?? ''
        }
      })
    },
    setAvatar (payload) {
      this.avatar = payload
    },

    resetPasswordForm () {
      this.password = {
        oldPassword: '',
        newPassword: '',
        confirmPassword: '',
        showOldPassword: false,
        showNewPassword: false,
        showConfirmPassword: false,
      }
      this.passwordErrors = []
    },

    resetGeneralForm () {
      this.generalErrors = []
    },
  }
})
