import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';

// Plugins
import { registerPlugins } from './plugins'

const app = createApp(App)
app.use(registerPlugins);
app.mount("#app");
