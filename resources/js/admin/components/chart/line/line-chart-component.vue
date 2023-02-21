<template>
   <v-card elevation="4">
    <v-card-title>Sales Chart</v-card-title>
    <Line :data="data" :options="options" />
  </v-card>
</template>

<script>
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
} from 'chart.js'
import { Line } from 'vue-chartjs'
import * as chartConfig from '@/components/chart/line/cart-config.js';

ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
)

export default {
    components: {
        // eslint-disable-next-line vue/no-reserved-component-names
        Line
    },
    data() {
        return chartConfig
    }
}
</script>

<style>

</style>