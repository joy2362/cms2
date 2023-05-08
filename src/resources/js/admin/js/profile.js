export const passwordUpdate = async (_this) => {
  _this.setGlobalLoading(true)
  const res = await _this.$post(_this.getApiRoutes.passwordUpdate, _this.getPasswordForm)
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.setPasswordForm({ oldPassword: '', newPassword: '', confirmPassword: '' })
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors.password = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}

export const updateAvatar = async (_this) => {
  _this.setGlobalLoading(true)
  const formData = new FormData()
  formData.append('avatar', _this.getAvatar)
  const res = await _this.$post(_this.getApiRoutes.avatarUpdate, formData)
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.setAvatar('')
    _this.setShowChangeAvatar(false)
    await setProfile(_this)
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors.image = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}

export const generalUpdate = async (_this) => {
  _this.setGlobalLoading(true)
  const res = await _this.$post(_this.getApiRoutes.generalUpdate, _this.getGeneralForm)
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.setProfile()
    _this.setGeneralForm()
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors.general = res.errors?.errors
  }
  _this.setGlobalLoading(false)
}

export const setProfile = async (_this) => {
  const res = await _this.$get(_this.getApiRoutes.getProfile)
  if (res.data?.success) {
    _this.profileSet(res.data)
  }
}