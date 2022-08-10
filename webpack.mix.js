const mix = require('laravel-mix');

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

mix.scripts('resources/js/jquery-3.6.0.min.js', 'public/js/jquery.js').version();
mix.scripts('resources/js/jquery-ui.js', 'public/js/jquery-ui.js').version();
mix.scripts('resources/js/admin.js', 'public/js/admin.js').version();

mix.sass('resources/sass/app.scss', 'public/css').version();
mix.sass('resources/sass/general/form.scss', 'public/css/general').version();
mix.sass('resources/sass/auth/auth.scss', 'public/css/auth').version();

mix.sass('resources/sass/admin/general.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/manage-form.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/program-card-list.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/program-list-list.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/user-list-list.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/coach-list.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/program-view.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/lesson-view.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/coach-view.scss', 'public/css/admin').version();
mix.sass('resources/sass/admin/paginator.scss', 'public/css/admin').version();
mix.css('resources/css/jquery-ui.css', 'public/css/general/jquery-ui.css').version();

mix.copy('resources/images/', 'public/images/');
mix.copy('resources/fonts/', 'public/fonts/');
