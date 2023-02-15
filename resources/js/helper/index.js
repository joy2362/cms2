/**
 * helpers/index.js
 *
 * Automatically included in `./src/app.js`
 */

import crud from "./crud";
import toaster from "./toaster";
import helper from "./helper";
export function registerHelper (app) {
    app
        .use(crud)
        .use(toaster)
        .use(helper)
}
