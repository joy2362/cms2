export const collect = (row, field) => {
  let data = '-'
  for (const [key, value] of Object.entries(row)) {
    if (key === field) {
      data = value
    }
  }
  return data
}