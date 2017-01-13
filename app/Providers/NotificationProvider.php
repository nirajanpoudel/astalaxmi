<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notification;

class NotificationProvider extends ServiceProvider
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
        return $view->with('notifications',Notification::where('visit',0)->get());
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
