<template>
  <div ref="table">
    <v-toolbar :title="title">
      <v-tooltip :text="createInfo.name">
        <template v-slot:activator="{ props }">
          <v-btn :to="createInfo.url" icon="mdi-plus" v-bind="props" variant="tonal"></v-btn>
        </template>
      </v-tooltip>
    </v-toolbar>
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
        <td>-</td>
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
import props from './props/props'
import { collect } from './js/dataTable'
import { mapWritableState } from 'pinia'
import { useDataTableStore } from '../../stores/dataTable'

export default {
  name: 'dataTable',
  props: props,

  computed: {
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
    }

  }
}
</script>

<style scoped>

</style>