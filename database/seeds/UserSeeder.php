<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ashraf Kabir',
            'email' => 'ashrafkabir95@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Sadia Farzana',
            'email' => 'sadiafarzana2612@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
