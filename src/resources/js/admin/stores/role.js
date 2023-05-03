import { defineStore } from 'pinia'

export const useAdminRoleStore = defineStore('role', {
  state: () => {
    return {
      data: [],
      permissions: [],
      total: 0,
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
      breadCrumb: [
        {
          title: 'Dashboard',
          disabled: false,
          href: '/admin/dashboard',
        }
      ],
      routes: {
        create: {
          name: 'Create Role',
          to: '/admin/role/store',
          icon: 'mdi-plus'
        },
        index: {
          name: 'All Role',
          to: '/admin/role',
          icon: 'mdi-eye'
        },
      },
      errors: [],
      singleData: {
        name: '',
        permissions: []
      },
      apiRoutes: {
        index: '/api/admin/role',
        create: '/api/admin/role',
        update: '/api/admin/role',
        permissions: '/api/admin/get-permissions',
      }
    }
  },
  getters: {
    getData (state) {
      return {
        data: state.data,
        total: state.total,
        columns: state.columns,
      }
    },
    getBreadcrumb (state) {
      return state.breadCrumb
    },
    getRoutes (state) {
      return state.routes
    },
    getApiRoutes (state) {
      return state.apiRoutes
    },
    getPermissions (state) {
      return state.permissions
    },
    getSingleData (state) {
      return state.singleData
    },
  },
  actions: {
    setBradCrumb (type = 'index') {
      this.breadCrumb.splice(1)
      this.breadCrumb.push(
        {
          title: 'Role',
          disabled: type === 'index',
          href: type === 'index' ? '' : '/admin/role',
        }
      )
      if (type !== 'index') {
        this.breadCrumb.push(
          {
            title: type === 'create' ? 'Create Role' : type === 'update' ? 'Update Role' : 'View Role',
            disabled: true,
            href: '',
          }
        )
      }
    },
    setData (role) {
      this.data = role.data
      this.total = role.total
    },
    setPermissions (permissions) {
      this.permissions = permissions
    },
    setSingleData (data) {
      this.singleData.name = data.role.name
      this.singleData.permissions = data.permissions
    }

  }
})