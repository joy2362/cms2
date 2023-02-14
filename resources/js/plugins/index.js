/**
 * plugins/index.js
 *
 * Automatically included in `./src/app.js`
 */

// Plugins
import vuetify from './vuetify'
import {routes} from '../routes/router'
import {createRouter, createWebHistory} from "vue-router";
import {createPinia} from "pinia";
import { loadFonts } from './webfontloader'
const pinia = createPinia();

const router = createRouter({
    history: createWebHistory(),
    routes
})

export function registerPlugins (app) {
    loadFonts()
    app
        .use(vuetify)
        .use(pinia)
        .use(router)
}
