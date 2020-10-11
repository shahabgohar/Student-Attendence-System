<?php

namespace App\Providers;

use App\ReuseableCode\MakeOutDatedAttendenceExpired;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use MakeOutDatedAttendenceExpired;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->doMakeOutDatedAttendenceExpired();
    }
}
