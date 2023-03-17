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
  searchable: {
    type: Boolean,
    required: false,
    default: true,
  },
  enableCheckbox: {
    type: Boolean,
    required: false,
    default: false,
  },
  columns: {
    type: Array,
    required: true,
  },
  sortable: {
    type: Boolean,
    required: false,
    default: true,
  },
  rows: {
    type: Array,
    required: true,
  },
}