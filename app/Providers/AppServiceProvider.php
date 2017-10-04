<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\user\Turbaza;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //T9m2J3s9
        Schema::defaultStringLength(191);
        $globalTurbazas = Turbaza::with('pages', 'cotteges', 'images')->where('deleted','!=',1)->where('status','=',1)->get();
        $bgcolor = DB::table('settings')->where('key', 'app_background_color')->first();

        view()->share(compact('globalTurbazas', 'bgcolor'));
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
