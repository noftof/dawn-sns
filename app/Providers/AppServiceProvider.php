<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        View::composer('*', function($view) {
            $follow_count = DB::table('follows')
                ->where('follow',Auth::id())
                ->count();
            $view->with('follow_count',$follow_count);
            $follower_count = DB::table('follows')
                ->where('follower',Auth::id())
                ->count();
            $view->with('follower_count',$follower_count);
        });

    }
}
