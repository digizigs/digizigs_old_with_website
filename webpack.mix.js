const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

/*mix.js('resources/js/app/app.js', 'public/js')
mix.js('resources/js/admin/admin.js', 'public/js')
   .sass('resources/sass/app/app.scss', 'public/css')
   .sass('resources/sass/admin/admin.scss', 'public/css');*/


mix.js('app/Asset/js/web/web_main.js', 'public/js')
mix.js('app/Asset/js/admin/admin_main.js', 'public/js')
mix.js('app/Asset/js/dashboard/dashboard.js', 'public/dashboard/assets/js')
    .sass('app/Asset/scss/web/web_main.scss', 'public/css')
    .sass('app/Asset/scss/admin/admin_main.scss', 'public/css')
	.sass('app/Asset/scss/dashboard/dashboard.scss', 'public/dashboard/assets/css');
