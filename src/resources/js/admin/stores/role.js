import { defineStore } from 'pinia'

export const useAdminRoleStore = defineStore('role', {
  state: () => {
    return {
      roles: [],
      total: '',
      columns: [
        {
          label: 'Name',
          field: 'name',
          sortable: true,
        },
        {
          label: 'Guard',
          field: 'guard_name',
          sortable: true,
        },
      ],
      breadcrumb: [
        {
          title: 'Dashboard',
          disabled: false,
          href: '/admin/dashboard',
        },
        {
          title: 'Role',
          disabled: true,
          href: '',
        },
      ],
      creadeBradecrumb: [],
      createInfo: {
        name: 'Create Role',
        url: '/admin/role/store'
      }

    }
  },
  getters: {
    getAllRole (state) {
      return state.roles
    },
    getTotal (state) {
      return state.total
    },
    getColumns (state) {
      return state.columns
    },
    getBreadcrumb (state) {
      return state.breadcrumb
    },
    getCreateInfo (state) {
      return state.createInfo
    },
    getCreadeBradecrumb (state) {
      return state.creadeBradecrumb
    },
  },
  actions: {
    setBradcrumb (type = 1) {
      this.creadeBradecrumb = [
        {
          title: 'Dashboard',
          disabled: false,
          href: '/admin/dashboard',
        },
        {
          title: 'Role',
          disabled: false,
          href: '/admin/role',
        },
        {
          title: type == 1 ? 'Create Role' : 'Update Role',
          disabled: true,
          href: '',
        },
      ]
    },
    setAllRole (payload = null) {
      const token = localStorage.getItem('token')
      let instance = axios.create({
        headers: {
          Authorization: `Bearer ${token}`,
        }
      })
      instance.get('/api/admin/role', { params: payload }).then(res => {
        if (res.status === 200) {
          this.roles = res.data.roles.data
          this.total = res.data.roles.total
        }
      })
    }
  }
})