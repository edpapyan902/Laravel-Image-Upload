<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\User::create([
            'name'     => 'test',
            'email'    => 'test@test.com',
            'password' => bcrypt('test'),
        ]);
    }
}
