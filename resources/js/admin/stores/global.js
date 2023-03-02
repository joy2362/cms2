import { defineStore } from 'pinia'

export const useGlobalStore = defineStore('global', {
  state: () => {
    return {
      showChangeAvatar: false,
    }
  },
  getters: {
    getShowChangeAvatar (state) {
      return state.showChangeAvatar
    }
  },
  actions: {
    setShowChangeAvatar(payload){
      this.showChangeAvatar = payload;
    },
  }
})
