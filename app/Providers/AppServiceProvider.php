<?php

namespace App\Providers;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        Department::preventLazyLoading(!app()->isProduction());
        Carbon::macro('toFormatedDate', function () {
            return $this->format('F j, Y  h:i:s A');
        });
    }
}
