<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $adminUser = [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin')
        ];

        if( !User::where('email, '$adminUser['email'])->exist() ){
            User::create($adminUser);
        }
    }
}
