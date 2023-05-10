/**
 * helpers/index.js
 *
 * Automatically included in `./src/app.js`
 */

import crud from './crud'
import toaster from './toaster'
import helper from './helper'
import Loading from '../components/common/Loading.vue'

export function registerHelper (app) {
  app
    .use(crud)
    .use(toaster)
    .use(helper)
    .component('GlobalLoading', Loading)
}
