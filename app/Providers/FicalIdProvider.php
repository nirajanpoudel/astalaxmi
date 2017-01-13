<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
class FicalIdProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('*', function ($view) {
        // dd(session()->get('fiscal_id'));
        // dd($view);
        return $view->with('fiscal_id',session()->get('fiscal_id'));
        });
    }


   
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
