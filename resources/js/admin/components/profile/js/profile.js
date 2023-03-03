export const submit = async (_this) => {
  const res = await _this.$post(_this.url, _this.getPasswordForm)
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.resetPasswordForm()
    _this.errors = []
  }
  if (res.errors?.error) {
    _this.$error(res.errors?.error)
  }
  if (res.errors?.errors) {
    _this.errors = res.errors?.errors
  }
}