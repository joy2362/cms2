/**
 * plugins/index.js
 *
 * Automatically included in `./src/app.js`
 */

// Plugins
import vuetify from './vuetify'
import {router} from '../routes/router'
import {createPinia} from "pinia";
import { loadFonts } from './webfontloader'
import Toaster from "@meforma/vue-toaster";
const pinia = createPinia();


export function registerPlugins (app) {
    loadFonts()
    app
        .use(vuetify)
        .use(pinia)
        .use(router)
        .use(Toaster)
}