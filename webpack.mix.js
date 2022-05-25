const mix = require("laravel-mix");

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

mix.combine(
    "resources/doc-template/css/*.css",
    "resources/doc-template/css/doc-template.css"
);

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/doc-template/css/doc-template.css", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        //
    ]);

mix.minify("public/css/doc-template.css");
mix.minify("public/js/app.js");
