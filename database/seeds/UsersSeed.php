<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	for($i=0; $i < 10; $i++){

    		User::create([
    			'name' => $name = $faker->name,
    			'email' => $faker->email,
    			'password' => bcrypt('password'),
                'api_token' => Str::random(80),//hash('sha256', Str::random(80)),
                'verify_token' => Str::random(80),//hash('sha256', Str::random(80)),
    		]);

    		
    	}  
    }
}
