<template>
  <div ref="table">
    <v-sheet class="py-4">
      <v-row>
        <v-col cols="2">
          <v-select
              v-model="search.field"
              :items="searchFields"
              item-title="label"
              item-value="field"
              label="Search Field"
              variant="solo"
          ></v-select>
        </v-col>
        <v-col cols="3">
          <v-text-field
              v-model="search.search"
              label="Search"
              variant="solo"
              @input="$emit('search')"
          ></v-text-field>
        </v-col>
      </v-row>
    </v-sheet>
    <v-table class="table">
      <thead>
      <tr>
        <th>#</th>
        <th v-for="(column, index) in columns"
            :key="index"
        >
          {{ column.label }}
          <v-icon v-if="column.sortable"
                  :icon="(this.search.sortField === column.field ? this.search.sortBy === 'desc' ? 'mdi-chevron-up' : 'mdi-chevron-down' : 'mdi-chevron-up')"
                  @click="sort(column.field)"></v-icon>
        </th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(row, index) in rows"
          :key="index"
      >
        <td>
          {{ getIndex(index) }}
        </td>
        <td v-for="(column, columnIndex) in columns"
            :key="columnIndex"
        >
          <div>
            {{ collect(row, column.field) }}
          </div>
        </td>
        <td>
          <v-menu>
            <template v-slot:activator="{ props }">
              <v-btn
                  color="primary"
                  icon="mdi-dots-vertical"
                  size="small"
                  v-bind="props"
              >
              </v-btn>
            </template>
            <v-list>
              <v-list-item
                  :to="generateUpdateLink(row.id)"
                  value="update"
              >
                <v-list-item-title>
                  <v-icon icon="mdi-update"></v-icon>
                </v-list-item-title>
              </v-list-item>
              <v-list-item
                  :to="generateShowLink(row.id)"
                  value="show"
              >
                <v-list-item-title>
                  <v-icon icon="mdi-open-in-new"></v-icon>
                </v-list-item-title>
              </v-list-item>

              <v-dialog
                  v-model="dialog"
                  persistent
                  width="500"
              >
                <template v-slot:activator="{ props }">
                  <v-list-item>
                    <v-list-item-title>
                      <v-icon icon="mdi-delete-outline" v-bind="props"></v-icon>
                    </v-list-item-title>
                  </v-list-item>
                </template>
                <v-card>
                  <v-toolbar
                      :title="deleteTitle"
                      color="warning"
                  ></v-toolbar>
                  <v-card-text>You will not able to revert it
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="primary"
                        variant="outlined"
                        @click="dialog = false"
                    >
                      Cancel
                    </v-btn>
                    <v-btn
                        color="red"
                        variant="flat"
                        @click="deleteItem(row.id)"
                    >
                      Yes, Delete it
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-dialog>

            </v-list>
          </v-menu>
        </td>
        <slot :row="row" name="tbody-tr"/>
      </tr>
      </tbody>
      <tfoot class="mt-3">
      <tr>
        <td colspan="4">
          <v-row class="align-center">
            <v-col cols="2">
              <v-select
                  v-model="search.perPage"
                  :items="perPage"
                  label="Rows per page"
                  variant="solo"
                  @update:modelValue="$emit('search')"
              ></v-select>
            </v-col>
            <v-col class="font-weight-bold" cols="3"> {{ pageStart }} - {{ pageEnd }} of {{ this.total }}
            </v-col>
            <v-spacer></v-spacer>
            <v-col cols="6">
              <v-pagination
                  v-model="search.page"
                  :length="totalPage"
                  :total-visible="totalVisible"
                  rounded="circle"
                  size="small"
                  @update:modelValue="$emit('search')"
              ></v-pagination>
            </v-col>
          </v-row>
        </td>
      </tr>
      </tfoot>
    </v-table>
  </div>
</template>

<script>
import { mapWritableState } from 'pinia'
import { useDataTableStore } from '../../stores/dataTable'
import { collect, deleteItem } from '../../js/dataTable'

export default {
  name: 'DataTable',
  props: {
    title: {
      type: String,
      required: true,
    },
    dialog: {
      type: Boolean,
      default: false,
      required: false,
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
    update: {
      type: String,
      required: false,
    },
    delete: {
      type: String,
      required: false,
    },
    show: {
      type: String,
      required: false,
    },
  },
  computed: {
    deleteTitle () {
      return `Delete the ${this.title}?`
    },
    totalPage () {
      return Math.ceil((this.total / this.search.perPage))
    },
    pageStart () {
      return (this.search.perPage * (this.search.page - 1)) + 1
    },
    pageEnd () {
      let pageEnd = this.search.perPage * this.search.page
      return this.total < pageEnd ? this.total : pageEnd
    },
    searchFields () {
      let fields = []
      fields = this.columns.filter(ele => {
        return ele.sortable
      })
      return fields
    },
    ...mapWritableState(useDataTableStore, { search: 'search', perPage: 'perPage', totalVisible: 'totalVisible' }),
  },
  methods: {
    generateUpdateLink (id) {
      return this.update ? `${this.update}/${id}` : `/admin/${this.title.toLowerCase()}/update/${id}`
    },
    generateShowLink (id) {
      return this.show ? `${this.show}/${id}` : `/admin/${this.title.toLowerCase()}/show/${id}`
    },
    getIndex (index) {
      return index + (this.search.perPage * (this.search.page - 1)) + 1
    },
    collect (row, field) {
      return collect(row, field)
    },
    sort (index) {
      if (this.search.sortField === index) {
        this.search.sortBy = this.search.sortBy === 'desc' ? 'asc' : 'desc'
      } else {
        this.search.sortBy = 'asc'
      }
      this.search.sortField = index
      this.$emit('search')
    },
    async deleteItem (id) {
      await deleteItem(this, id)
    }

  }
}
</script>

<style scoped>

</style>