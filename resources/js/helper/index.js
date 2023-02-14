/**
 * helpers/index.js
 *
 * Automatically included in `./src/app.js`
 */

import crud from "./crud";
export function registerHelper (app) {
    app
        .use(crud)
}
