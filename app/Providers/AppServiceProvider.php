<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'bill' => \App\Bill::class,
            'invoice' => \App\Invoice::class,
        ]);
         \Validator::extend('shuldbeInyear', function($attribute, $value, $parameters, $validator) {
            if($value < \Config::get('fiscal_year_end') && $value > \Config::get('fiscal_year_start'));
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
