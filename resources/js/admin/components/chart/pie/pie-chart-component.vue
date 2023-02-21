<template>
  <v-card elevation="4">
    <v-card-title>Most Popular Programming Language</v-card-title>
    <Pie :data="data" :options="options" />
  </v-card>
</template>

<script>

import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Pie } from 'vue-chartjs';
import * as chartConfig from '../doughnut/chart-config';

ChartJS.register(ArcElement, Tooltip, Legend)

export default {
    components: {
        Pie
    },
    data() {
        return chartConfig
    }
}
</script>

<style>

</style>