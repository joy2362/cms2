<template>
  <div ref="table">
    <v-card-title>
      {{ title }}
    </v-card-title>
    <v-sheet>
      <v-row>
        <v-col cols="2">
          <v-select
              v-model="select"
              :items="items"
              label="Item"
              required
          ></v-select>
        </v-col>
        <v-col cols="3">
          <v-text-field
              v-model="name"
              label="Search"
          ></v-text-field>
        </v-col>
        <v-spacer></v-spacer>
        <v-col cols="1">
          <v-btn
              v-if="exportToExcel"
              color="success"
              icon="mdi-file-excel"
              size="x-small"
              @click="exportExcel"
          ></v-btn>
          <v-btn
              v-if="printable"
              color="primary"
              icon="mdi-cloud-print"
              size="x-small"
              @click="printData"
          ></v-btn>
        </v-col>
      </v-row>
    </v-sheet>
    <v-table ref="table">
      <thead>
      <tr>
        <th>#</th>
        <th v-for="(column, index) in columns"
            :key="index"

        >
          {{ column.label }}
          <v-icon v-if="column.sortable" :icon="(sortColumn === column.field ? sortType === 'desc' ? 'mdi-chevron-up' : 'mdi-chevron-down' : 'mdi-chevron-up')"
                  @click="sort(column.field)"></v-icon>
        </th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(row, index) in rows"
          :key="index"
      >
        <td>
          {{ index }}
        </td>
        <td v-for="(column, columnIndex) in columns"
            :key="columnIndex"
        >
          <div>
            {{ collect(row, column.field) }}
          </div>

        </td>
        <slot :row="row" name="tbody-tr"/>
      </tr>
      </tbody>
    </v-table>
  </div>
</template>

<script>
import props from './props/props'
import { collect } from './js/dataTable'

export default {
  name: 'dataTable',
  props: props,
  data () {
    return {
      searchInput: '',
      sortColumn: '',
      sortType: 'desc',
      items: [
        'Item 1',
        'Item 2',
        'Item 3',
        'Item 4',
      ],
    }
  },
  methods: {
    exportExcel () {
      console.log('exportExcel')
    },
    printData () {
      console.log('printData')
    },
    collect (row, field) {
      return collect(row, field)
    },
    sort (index) {
      if (this.sortColumn === index) {
        this.sortType = this.sortType === 'desc' ? 'asc' : 'desc'
      } else {
        this.sortType = 'asc'
      }

      this.sortColumn = index
    }

  }
}
</script>

<style scoped src="./css/style.css">

</style>