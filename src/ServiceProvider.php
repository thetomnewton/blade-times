<?php

namespace Thetomnewton\BladeTimes;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Date;
use Thetomnewton\BladeTimes\BladeTimes;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $timezone = BladeTimes::timezone();

        Blade::if('until', function ($dateTime) use ($timezone) {
            return strtotime($dateTime) !== false
                && Date::now($timezone)->lte(Date::parse($dateTime, $timezone));
        });

        Blade::if('after', function ($dateTime) use ($timezone) {
            return strtotime($dateTime) !== false
                && Date::now($timezone)->gt(Date::parse($dateTime, $timezone));
        });

        Blade::if('before', function ($dateTime) use ($timezone) {
            return strtotime($dateTime) !== false
                && Date::now($timezone)->lte(Date::parse($dateTime, $timezone));
        });

        Blade::if('between', function ($before, $after) use ($timezone) {
            return strtotime($before) !== false
                && strtotime($after) !== false
                && Date::now($timezone)->gte(Date::parse($before, $timezone))
                && Date::now($timezone)->lte(Date::parse($after, $timezone));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BladeTimes::class, function ($app) {
            return new BladeTimes($app['config']['app']['timezone'] ?? 'UTC');
        });
    }
}
