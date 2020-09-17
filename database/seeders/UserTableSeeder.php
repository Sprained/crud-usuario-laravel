<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'adm',
            'email' => 'adm@email.com',
            'password' => Hash::make('adm@123'),
            'cpf' => 11111111111,
            'academico' => 202021108,
            'phone' => 81999999999
        ]);

        $password = Hash::make('teste@123');
        for($i = 0; $i < 10; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'cpf' => $faker->unique()->numberBetween($min = 11111111111111, $max = 99999999999999),
                'academico' => 20202 . $faker->unique()->numberBetween($min = 1111, $max = 9999),
                'phone' => 819 . $faker->numberBetween($min = 11111111, $max = 99999999)
            ]);
        }
    }
}
