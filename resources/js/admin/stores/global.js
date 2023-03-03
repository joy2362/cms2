import { defineStore } from 'pinia'

export const useGlobalStore = defineStore('global', {
  state: () => {
    return {
      showChangeAvatar: false,
      logo: import.meta.env.VITE_APP_URL + '/assets/logo/logo.png',
      loading: {
        show: false,
        transition: 'fade',
        color: '#145A32',
        iconWidth: 45,
        iconHeight: 45,
      }
    }
  },
  getters: {
    getShowChangeAvatar (state) {
      return state.showChangeAvatar
    },
    getLoading (state) {
      return state.loading
    },
    getLogo (state) {
      return state.logo
    }
  },
  actions: {
    setShowChangeAvatar (payload) {
      this.showChangeAvatar = payload
    },
    setGlobalLoading (payload) {
      this.loading.show = payload
    },
  }
})
