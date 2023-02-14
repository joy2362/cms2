<template>
  <v-card elevation="4">
    <v-card-title>Sales Chart</v-card-title>
    <Bar :data="data" />
  </v-card>
</template>

<script>

import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js'
import { Bar } from 'vue-chartjs';
import * as chartConfig from './chart-data-config';

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)

export default {
    components: {
        Bar
    },
    data() {
        return chartConfig
    }
}
</script>

<style>

</style>
