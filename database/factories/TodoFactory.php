<?php

namespace Database\Factories;

use App\Todo;
use Faker\Factory as Faker;

$factory->define(Todo::class, function () use ($faker) {
  $faker = Faker::create();
  return [
    'name'        => $faker->sentence(3),
    'description' => $faker->paragraph(4),
    'completed'   => false
  ];
});
