<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('mb_max', function ($attribute, $value, $parameters, $validator) {
            $max = isset($parameters[0]) ? (int) $parameters[0] : 0;
            return mb_strlen($value) <= $max;
        });
    }
}
