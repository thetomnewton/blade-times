<?php

namespace Thetomnewton\BladeTimes;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('until', function ($dateTime) {
            return strtotime($dateTime) !== false
                && Date::now()->lte(Date::parse($dateTime));
        });

        Blade::if('after', function ($dateTime) {
            return strtotime($dateTime) !== false
                && Date::now()->gt(Date::parse($dateTime));
        });

        Blade::if('before', function ($dateTime) {
            return strtotime($dateTime) !== false
                && Date::now()->lte(Date::parse($dateTime));
        });

        Blade::if('between', function ($before, $after) {
            return strtotime($before) !== false
                && strtotime($after) !== false
                && Date::now()->gte(Date::parse($before))
                && Date::now()->lte(Date::parse($after));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
