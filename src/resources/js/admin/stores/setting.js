import { defineStore } from 'pinia'

export const useSettingStore = defineStore('setting', {
  state: () => {
    return {
      theme: localStorage.getItem('theme') ?? 'dark',
      drawer: false
    }
  },
  getters: {
    getTheme (state) {
      return state.theme
    },
    getDrawer (state) {
      return state.drawer
    }
  },
  actions: {
    setTheme (payload) {
      localStorage.setItem('theme', payload)
      this.theme = payload
    },
    setDrawer () {
      this.drawer = !this.drawer
    }
  }
})