<?php

namespace Thetomnewton\BladeTimes;

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
                && now()->lte(Carbon::parse($dateTime));
        });

        Blade::if('after', function ($dateTime) {
            return strtotime($dateTime) !== false
                && now()->gt(Carbon::parse($dateTime));
        });

        Blade::if('before', function ($dateTime) {
            return strtotime($dateTime) !== false
                && now()->lte(Carbon::parse($dateTime));
        });

        Blade::if('between', function ($before, $after) {
            return strtotime($before) !== false
                && strtotime($after) !== false
                && now()->gte(Carbon::parse($before))
                && now()->lte(Carbon::parse($after));
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
