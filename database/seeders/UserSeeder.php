<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

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
      'name'      => 'Ashraf Kabir',
      'email'     => 'ashrafkabir95@gmail.com',
      'password'  => bcrypt('12345678'),
      'is_admin'  => true,
      'is_active' => true
    ]);
  }
}
