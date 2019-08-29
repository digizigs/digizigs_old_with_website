<?php

namespace App\Providers;

use App\Models\Setting;
use BeyondCode\Mailbox\Facades\Mailbox;
use BeyondCode\Mailbox\InboundEmail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //For database varchar length settings
        Schema::defaultStringLength(191);

        Resource::withoutWrapping();

        //For App setting details
        if (Schema::hasTable('settings')) {
            foreach (Setting::all() as $setting) {
                Config::set('settings.'.$setting->key, $setting->value);
            }
        }

        $database = env('DB_DATABASE', '1.0');

        /*if($database <> 'digizigss'){
            return view('admin.setting.app_setup');
        }*/

        //app('log')->debug('App Service provider boot function triggred');
 

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        

    }
}
