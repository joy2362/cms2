import { defineStore } from 'pinia'

export const useDataTableStore = defineStore('dataTable', {
  state: () => {
    return {
      search: {
        perPage: 5,
        page: 1,
        field: '',
        search: '',
        sortField: '',
        sortBy: 'desc',
      },
      perPage: [5, 10, 15, 20, 25, 50, 100],
      totalVisible: 4
    }
  },
  getters: {
    getSearch (state) {
      return state.search
    }
  }
})
