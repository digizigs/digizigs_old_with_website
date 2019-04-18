<?php

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeed extends Seeder
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

    		Client::create([
    			'client_name' => $name = $faker->name,
    			'client_website' =>  $faker->safeEmailDomain,
    			'client_phone' => $faker->phoneNumber,
    			'client_email' => $faker->email,    			
    		]);

    		
    	}  
    }
}
