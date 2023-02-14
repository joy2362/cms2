import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';

// Plugins
import { registerPlugins } from './plugins'
import { registerHelper } from './helper'

const app = createApp(App)

app.config.globalProperties.asset = import.meta.env.VITE_APP_URL

app.use(registerPlugins);
app.use(registerHelper);
app.mount("#app");
