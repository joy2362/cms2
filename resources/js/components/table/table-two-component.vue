<template>
    <v-toolbar color="white" elevation="4">
        <v-container>
            <v-text-field 
                label="Search" 
                variant="underlined" 
                append-icon="mdi-magnify" 
                color="primary"
                v-model="search"
            >
            </v-text-field>
        </v-container>
    </v-toolbar>
    <v-table
        fixed-header
        height="300px"
    >
        <thead>
            <tr>
                <th class="text-left">
                    Name
                </th>
                <th class="text-left">
                    Calories
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in paginatedData" :key="item.name">
                <td>{{ item.name }}</td>
                <td>{{ item.calories }}</td>
            </tr>
        </tbody>
    </v-table>
    <v-card>
        <v-container>
            <v-row>
                <v-col cols="cols">
                    <v-autocomplete
                        label="Shows"
                        :items="[3, 5, 10, 15]"
                        variant="underlined"
                        v-model="rowCountPage"
                    ></v-autocomplete>
                </v-col>
                <v-col cols="cols">
                    <v-pagination
                        v-model="page"
                        :length="length"
                        @next="nextPage"
                        @prev="prevPage"
                    ></v-pagination>
                </v-col>
            </v-row>
        </v-container>
    </v-card>
</template>

<script>

export default {
    data () {
      return {
        search: '',
        page: 1,
        desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
          },
          {
            name: 'Eclair',
            calories: 262,
          },
          {
            name: 'Cupcake',
            calories: 305,
          },
          {
            name: 'Gingerbread',
            calories: 356,
          },
          {
            name: 'Jelly bean',
            calories: 375,
          },
          {
            name: 'Lollipop',
            calories: 392,
          },
          {
            name: 'Honeycomb',
            calories: 408,
          },
          {
            name: 'Donut',
            calories: 452,
          },
          {
            name: 'KitKat',
            calories: 518,
          },
        ],
        rowCountPage: 5,
      }
    },
    computed: {
        filteredData() {
            if(this.search) {
                return this.desserts.filter((item) => {
                    return item.name.toLowerCase().includes(this.search.toLowerCase())
                })
            } else {
                return this.desserts
            }
        },
        paginatedData() {
            const start = (this.page - 1) * this.rowCountPage
            const end = start + this.rowCountPage
            return this.filteredData.slice(start, end)
        },
        length() {
            return Math.ceil(this.filteredData.length / this.rowCountPage)
        }
    },
    methods: {
        nextPage() {
            if (this.page < this.length) {
                this.page++
            }
        },
        prevPage() {
            if (this.page > 1) {
                this.page--
            }
        },
    }
}
</script>

<style>

</style>