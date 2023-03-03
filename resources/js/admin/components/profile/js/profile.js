export const passwordUpdate = async (_this) => {
  _this.setGlobalLoading(true)
  const res = await _this.$post(_this.getPasswordUpdateUrl, _this.getPasswordForm)
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.resetPasswordForm()
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.passwordErrors = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}

export const generalUpdate = async (_this) => {
  _this.setGlobalLoading(true)
  const res = await _this.$post(_this.getGeneralUpdateUrl, _this.getGeneralProfile)
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.setProfile()
    _this.resetGeneralForm()
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.generalErrors = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}