/**
 * helpers/index.js
 *
 * Automatically included in `./src/app.js`
 */

import crud from "./crud";
import toaster from "./toaster";
export function registerHelper (app) {
    app
        .use(crud)
        .use(toaster)
}
