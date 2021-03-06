<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $generator)
    {
        $user = \App\User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'address' => $generator->address,
            'remember_token'=>'',
            'phone_number' => $generator->phoneNumber,
            'created_at' => \Carbon\Carbon::now()->subDays(rand(1, 100))
        ]);
    }
}
