<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Profile;
use Illuminate\Support\Str;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'api_token' => Str::random(80),
                'verify_token' => Str::random(80),
            ]
        );
        $profile = Profile::create(
            [
                'user_id' => $user->id,
            ]
        );
        $user->assignRole('superadmin');
    }
}
