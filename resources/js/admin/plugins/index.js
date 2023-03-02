/**
 * plugins/index.js
 *
 * Automatically included in `./src/Admin.js`
 */

// Plugins
import vuetify from './vuetify'
import { router } from '../routes/router'
import { createPinia } from 'pinia'
import { loadFonts } from './webfontloader'
import Toaster from '@meforma/vue-toaster'
import { useGlobalStore } from '../stores/global'

const pinia = createPinia()

export function registerPlugins (app) {
  loadFonts()
  app
    .use(vuetify)
    .use(pinia)
    .use(router)
    .use(Toaster)
    useGlobalStore();
}
