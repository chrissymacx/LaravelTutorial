<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Services\Twitter;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * Register stuff for the service
     * container.
     *
     * @return void
     */
    public function register()
    {

        /*$this->app->singleton(\App\Services\Twitter::class, function() {
            return new \App\Services\Twitter('api-key');
        });*/


        //back-end service providers example. you want to use this implementation
        //for interfaces.
       /* $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\DbUserRepository::class
        );*/

     /*  $this->app->singleton(Twitter::class, function() {
           return new Twitter(config('services.twitter.secret'));
       });*/

        //TODO (example) add more social media services
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
