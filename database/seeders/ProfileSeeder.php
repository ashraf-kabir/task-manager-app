<?php

namespace Database\Seeders;

use App\Company;
use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user    = User::where('email', 'ashrafkabir95@gmail.com')->first();

    Profile::create([
      'user_id'    => $user->id,
      'phone'      => '123-456-7890',
      'address'    => 'H-34/A, R-01, Mohammadi Housing Ltd, Mohammadpur',
      'city'       => 'Dhaka',
      'state'      => 'Dhaka',
      'zip'        => '1207',
      'country'    => 'Bangladesh'
    ]);
  }
}
