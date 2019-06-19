<?php
namespace App\Providers;

use App\User;
use App\Tweet;
use App\Follow;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function($view) {
            $view->with('user', Auth::user());
        });

        View::composer('*', function($view) {
            $view->with('said_tweet', Tweet::where('user_id', Auth::id())->get());
        });

        View::composer('*', function($view) {
            $view->with('said_follow', Follow::where('user_id', '=', Auth::id())->get());
        });

        View::composer('*', function($view) {
            $view->with('said_follower', Follow::where('follow_id', '=', Auth::id())->get());
        });

        View::composer('*', function($view) {
            $view->with('said_user', User::where('id', '!=', Auth::id())->get());
        });
    }
}
