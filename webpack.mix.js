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
mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/admin/plugins/daterangepicker/daterangepicker.css',
    'resources/assets/admin/plugins/select2/css/select2.css',
    'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
    'resources/assets/admin/css/adminlte.min.css'
], 'public/assets/admin/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.min.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/admin/plugins/daterangepicker/daterangepicker.js',
    'resources/assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'resources/assets/admin/plugins/select2/js/select2.full.js',
    'resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/demo.js'
], 'public/assets/admin/js/admin.js');

mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');
mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts', 'public/assets/admin/webfonts');

mix.copy('resources/assets/admin/css/adminlte.min.css.map', 'public/assets/admin/css/adminlte.min.css.map');

mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/front/css/bootstrap.css',
    'resources/assets/front/css/chocolat.css',
    'resources/assets/front/css/flexslider.css',
    'resources/assets/front/css/style.css',
], 'public/assets/front/css/front.css');

mix.scripts([
    'resources/assets/front/js/jquery-1.11.1.min.js',
    'resources/assets/front/js/bootstrap.js',
    'resources/assets/front/js/jquery.chocolat.js',
    'resources/assets/front/js/jquery.flexslider.js',
], 'public/assets/front/js/front.js');
mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts', 'public/assets/front/webfonts');
mix.copyDirectory('resources/assets/front/fonts', 'public/assets/front/fonts');
mix.copyDirectory('resources/assets/front/images', 'public/assets/front/images');
