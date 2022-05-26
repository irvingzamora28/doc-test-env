const mix = require("laravel-mix");
const del = require("del");
const fs = require("fs");

mix.browserSync({
    proxy: "http://127.0.0.1:8000",
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

//  mix.then(() => {
//     del('public/css/doc-template.min.css');
// });

// mix.combine(
//     ["resources/doc-template/css/highlightjs-dark.css", "resources/doc-template/css/style.css"],
//     "resources/doc-template/css/doc-template.css"
// );

mix.then(() => {
    // if (fs.existsSync("public/css/doc-template.min.css")) {
    //     del("public/css/doc-template.min.css");
    // }
});

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/doc-template/css/highlightjs-dark.css", "public/css")
    .postCss("resources/doc-template/css/style.css", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        //
    ])
    // .then(() => {
    //     del('public/css/highlightjs-dark.css');
    //     del('public/css/style.css');
    //     del('public/css/doc-template.css');
    // })
    
// .then(() => {
//     del('public/css/highlightjs-dark.css');
//     del('public/css/style.css');
//     del('public/css/doc-template.css');
// });

mix.combine([
    "public/css/highlightjs-dark.css",
    "public/css/style.css",
], "public/css/doc-template.css");
mix.minify("public/css/doc-template.css");
mix.minify("public/js/app.js");

if (mix.inProduction()) {
    mix.then(() => {
        if (fs.existsSync("public/css/highlightjs-dark.css")) {
            del("public/css/highlightjs-dark.css");
        }
        if (fs.existsSync("public/css/style.css")) {
            del("public/css/style.css");
        }
    });
}
