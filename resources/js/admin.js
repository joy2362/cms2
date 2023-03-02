import './adminBootstrap'
import { createApp } from 'vue'
import App from './Admin.vue'

// Plugins
import { registerPlugins } from './admin/plugins'
import { registerHelper } from './admin/helper'

const app = createApp(App)

app.config.globalProperties.asset = import.meta.env.VITE_APP_URL

app.use(registerPlugins)
app.use(registerHelper)

app.mount('#app')
