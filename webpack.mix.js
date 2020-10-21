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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
mix.postCss('resources/css/admin/app.css','public/css/admin/app.css')
mix.js('resources/js/student-details.js','public/js/student-details.js')
mix.js('resources/js/attendence-search.js','public/js/attendence-search.js')
mix.js('resources/js/attendence.js','public/js/attendence.js')
mix.js('resources/js/student-report.js','public/js/student-report.js')
mix.js('resources/js/submit-leave.js','public/js/submit-leave.js')
mix.js('resources/js/view-attendence.js','public/js/view-attendence.js')
mix.js('resources/js/leave-approval.js','public/js/leave-approval.js')
mix.js('resources/js/attendence-details.js','public/js/attendence-details.js')

