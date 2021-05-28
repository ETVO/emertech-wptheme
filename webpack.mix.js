const mix = require('laravel-mix');

mix.disableSuccessNotifications();

mix.js('src/js/app.js', 'js')
   .sass('src/scss/style.scss', 'css')
   .sass('src/scss/custom-bs.scss', 'css')
   .setPublicPath('assets');

mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'assets/js/third');
mix.copy('node_modules/bootstrap-icons/font/', 'assets/fonts/bootstrap-icons');