import { defineStore } from 'pinia'

export const useGlobalStore = defineStore('global', {
  state: () => {
    return {
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
    getLoading (state) {
      return state.loading
    },
    getLogo (state) {
      return state.logo
    }
  },
  actions: {
    setGlobalLoading (payload) {
      this.loading.show = payload
    },
  }
})
