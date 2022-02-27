<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use App\Services\HelmService as Helm;

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
        Validator::extend('lower_alpha_num', function ($attribute, $value, $parameters, $validator) {
            return is_string($value) && preg_match('/^[a-z0-9]+$/u', $value);
        }, "The :attribute must only contain lower case letters and numbers.");
        URL::forceScheme('https');
        Helm::add_repo();
    }
}
