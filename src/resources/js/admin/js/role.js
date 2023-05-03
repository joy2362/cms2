export const getRoles = async (_this, payload) => {
  const res = await _this.$get(_this.getApiRoutes.index, payload)
  _this.setData(res.data?.success ? {
    data: res.data.roles.data,
    total: res.data.roles.total,
  } : {})
}

export const getPermissions = async (_this) => {
  const res = await _this.$get(_this.getApiRoutes.permissions)
  _this.setPermissions(res.data?.success ? res.data.permissions : {})
}

export const getSingleData = async (_this, id) => {
  const res = await _this.$get(`${_this.getApiRoutes.update}/${id}`)
  _this.setSingleData(res.data?.success ? res.data : {})
}

export const updateRole = async (_this, id) => {
  _this.setGlobalLoading(true)
  const url = `${_this.getApiRoutes.update}/${id}`
  let formData = new FormData()
  formData.append('_method', 'PUT')
  formData.append('name', _this.getSingleData.name)
  _this.getSingleData.permissions.forEach((item) => {
    formData.append('permissions[]', item)
  })

  const res = await _this.$post(url, formData)

  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.$router.push({ name: 'admin.role.index' })
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}
export const createRole = async (_this) => {
  _this.setGlobalLoading(true)
  const res = await _this.$post(_this.getApiRoutes.create, _this.getSingleData)
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.setSingleData({ name: '', permissions: [] })
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}