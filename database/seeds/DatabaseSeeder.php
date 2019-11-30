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
        DB::table('users')->insert([
            'name' => 'rivan',
            'status' => '0',
            'email' => 'rivan@rivan.com',
            'password' => Hash::make('123456')
        ]);
    }
}
