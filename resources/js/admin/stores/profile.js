import { defineStore } from 'pinia'

export const useProfileStore = defineStore('profile', {
  state: () => {
    return {
      profile: [],
      avatar: '',
      name: '',
      email: '',
      oldPassword: '',
      newPassword: '',
      confirmPassword: '',
    }
  },
  getters: {
    getProfile (state) {
      return state.profile
    },
    getGeneralProfile (state) {
      return {
        name: state.name,
        email: state.email,
      }
    },
    getPasswordForm (state) {
      return {
        oldPassword: state.oldPassword,
        newPassword: state.newPassword,
        confirmPassword: state.confirmPassword,
      }
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
        this.name = res.data.profile.name ?? ''
        this.email = res.data.profile.email ?? ''
      })
    },
    setAvatar (payload) {
      this.avatar = payload
    },

    resetPasswordForm () {
      this.oldPassword = ''
      this.newPassword = ''
      this.confirmPassword = ''
    }
  }
})
