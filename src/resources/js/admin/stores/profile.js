import { defineStore } from 'pinia'

export const useProfileStore = defineStore('profile', {
  state: () => {
    return {
      profile: [],
      form: {
        name: '',
        email: '',
        avatar: '',
        oldPassword: '',
        newPassword: '',
        confirmPassword: '',
      },
      showChangeAvatar: false,
      showBtn: {
        old: false,
        new: false,
        confirm: false,
      },
      breadCrumb: [
        {
          title: 'Dashboard',
          disabled: false,
          href: '/admin/dashboard',
        },
        {
          title: 'Profile',
          disabled: true,
          href: '',
        },
      ],
      errors: {
        password: [],
        general: [],
        image: [],
      },
      apiRoutes: {
        passwordUpdate: '/api/admin/profile/password',
        generalUpdate: '/api/admin/profile/general',
        avatarUpdate: '/api/admin/profile/image',
        getProfile: '/api/admin/profile',
      },
    }
  },
  getters: {
    getProfile (state) {
      return state.profile
    },
    getGeneralForm (state) {
      return {
        name: state.form.name,
        email: state.form.email
      }
    },
    getPasswordForm (state) {
      return {
        oldPassword: state.form.oldPassword,
        newPassword: state.form.newPassword,
        confirmPassword: state.form.confirmPassword,
      }
    },
    getErrors (state) {
      return state.errors
    },
    getBreadCrumb (state) {
      return state.breadCrumb
    },
    getApiRoutes (state) {
      return state.apiRoutes
    },
    getShowChangeAvatar (state) {
      return state.showChangeAvatar
    },
    getAvatar (state) {
      return state.form.avatar
    },
  },
  actions: {
    setShowChangeAvatar (payload) {
      this.showChangeAvatar = payload
    },
    setProfile (payload = []) {
      this.profile = payload?.profile ?? []
      this.form = {
        name: payload?.profile.name ?? '',
        email: payload?.profile.email ?? ''
      }
    },

    setAvatar (payload) {
      this.form.avatar = payload
    },

    setPasswordForm (payload) {
      this.form.oldPassword = payload.oldPassword
      this.form.newPassword = payload.newPassword
      this.form.confirmPassword = payload.confirmPassword
      this.errors.password = []
    },

    setGeneralForm () {
      this.errors.general = []
    },
  }
})
