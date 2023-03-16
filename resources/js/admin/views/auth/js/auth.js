export const login = async (_this) => {
  _this.setGlobalLoading(true)
  const res = await _this.$postWithOutToken(_this.getLoginUrl, _this.getLoginData)
  if (res.data?.success) {
    _this.authToken(res.data.token)
    _this.setErrors()
    _this.clearLogin()
    _this.$success(res.data.message)
    _this.$router.push({ name: 'admin.dashboard' })
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}

export const forgetPassword = async (_this) => {
  _this.setGlobalLoading(true)
  const res = await _this.$postWithOutToken(_this.getForgetPasswordUrl, _this.getForgetPassData)
  if (res.data?.success) {
    _this.setErrors()
    _this.clearForgetPassword()
    _this.$success(res.data.message)
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}

export const resetPassword = async (_this) => {
  _this.setGlobalLoading(true)
  const res = await _this.$postWithOutToken(_this.getResetPasswordUrl, _this.getResetPassData)
  if (res.data?.success) {
    _this.setErrors()
    _this.clearForgetPassword()
    _this.$success(res.data.message)
    _this.$router.push({ name: 'admin.login' })
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}