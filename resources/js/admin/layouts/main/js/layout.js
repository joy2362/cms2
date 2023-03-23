export const logout = async (_this) => {
  const res = await _this.$post('logout')
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.logoutFromState()
    _this.$router.push('/admin/login')
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
}

export const changeTheme = (_this) => {
  let theme = _this.getTheme === 'dark' ? 'light' : 'dark'
  _this.setTheme(theme)
}