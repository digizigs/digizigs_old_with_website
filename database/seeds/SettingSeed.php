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
        Setting::create(['name' => 'app_name','val'=>'DigiCRM']);
        Setting::create(['name' => 'admin_url','val'=>'admin']);
        Setting::create(['name' => 'admin_email','val'=>'admin@admin.com']);
        Setting::create(['name' => 'app_description','val'=>'admin']);
    }
}
