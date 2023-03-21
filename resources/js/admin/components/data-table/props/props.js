export default {
  title: {
    type: String,
    required: true,
  },
  exportToExcel: {
    type: Boolean,
    required: false,
    default: true,
  },
  printable: {
    type: Boolean,
    required: false,
    default: true,
  },
  columns: {
    type: Array,
    required: true,
  },
  rows: {
    type: Array,
    required: true,
  },
  total: {
    type: [String, Number],
    required: true,
  },
}