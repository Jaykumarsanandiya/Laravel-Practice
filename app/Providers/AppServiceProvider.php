<?php

namespace App\Providers;

use App\PostCardSendingService;
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
        // register a facades
        $this->app->singleton('Postcard', function($app){
            return new PostCardSendingService('India',20,100);
        });
    }
}
