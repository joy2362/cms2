export const collect = (row, field) => {
  let data = '-'
  for (const [key, value] of Object.entries(row)) {
    if (key === field) {
      data = value
    }
  }
  return data
}

export const deleteItem = async (_this, id) => {
  const url = _this.delete ? `${_this.delete}/${id}` : `/api/admin/${_this.title.toLowerCase()}/${id}`
  const res = await _this.$delete(url)
  if (res.data?.success) {
    _this.$success(res.data.message)
    _this.$emit('search')
  }
  if (res.error) {
    _this.$error(res.error.message)
    _this.dialog = false
  }
}