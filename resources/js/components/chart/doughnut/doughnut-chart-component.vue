<template>
  <v-card elevation="4">
    <v-card-title>Most Popular Programming Language</v-card-title>
    <Doughnut :data="data" :options="options" />
  </v-card>
</template>

<script>

import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'
import * as chartConfig from './chart-config.js'

ChartJS.register(ArcElement, Tooltip, Legend)
export default {
    components: {
        Doughnut
    },
    data() {
        return chartConfig
    }
}
</script>

<style>

</style>