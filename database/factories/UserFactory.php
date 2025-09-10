<?php

namespace Database\Factories;

use App\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function () use ($faker) {
  $faker = Faker::create();
  return [
    'name'              => $faker->name(),
    'email'             => $faker->unique()->safeEmail(),
    'email_verified_at' => now(),
    'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    'remember_token'    => Str::random(10)
  ];
});
