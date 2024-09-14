<?php

namespace Database\Seeders;

use App\Company;
use App\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::where('email', 'ashrafkabir95@gmail.com')->first();

    Company::create([
      'user_id' => $user->id,
      'name'    => 'Vegas Liquidation',
      'address' => '3020 N Walnut Rd Unit 120',
      'city'    => 'Las Vegas',
      'state'   => 'NV',
      'zip'     => '89115',
      'country' => 'United States of America'
    ]);
  }
}
