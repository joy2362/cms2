/**
 * plugins/vuetify.js
 *
 * Framework documentation: https://vuetifyjs.com`
 */

// Styles
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

// Composable
import { createVuetify } from 'vuetify'

// https://vuetifyjs.com/en/introduction/why-vuetify/#feature-guides
export default createVuetify({
    icons: {
        defaultSet: 'mdi', // This is already the default value - only for display purposes
    },
    theme: {
        themes: {
            light: {
                colors: {
                    primary: '#1867C0',
                    secondary: '#5CBBF6',
                },
            },
        },
    },
})
