<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'    => 'admin@acidfinance.com',
            'username'     => 'Admin',
            'password' => bcrypt('secret'),
            'email_verified_at' => now(),
        ]);
        $users = factory(User::class, 10)->create();
    }
}
