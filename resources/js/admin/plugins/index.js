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
import { useAuthStore } from '../stores/auth'
import { useProfileStore } from '../stores/profile'
import { useAdminRoleStore } from '../stores/role'
import { useDataTableStore } from '../stores/dataTable'

const pinia = createPinia()

export function registerPlugins (app) {
  loadFonts()
  app
    .use(vuetify)
    .use(pinia)
    .use(router)
    .use(Toaster)
  useGlobalStore()
  useAuthStore()
  useProfileStore()
  useAdminRoleStore()
  useDataTableStore()
}
