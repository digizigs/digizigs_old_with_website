<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['name' => 'app_name','val'=>'DigiZigs']);
        Setting::create(['name' => 'app_admin_url','val'=>'appadmin']);
        Setting::create(['name' => 'app_email','val'=>'admin@admin.com']);
        Setting::create(['name' => 'app_description','val'=>'admin']);
        Setting::create(['name' => 'home_page','val'=>1]);
        Setting::create(['name' => 'post_per_page','val'=>10]);
    }
}
