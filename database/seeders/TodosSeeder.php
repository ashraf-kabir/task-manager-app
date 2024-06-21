<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Todo::class, 5)->create();
        \App\Todo::factory(5)->create();
    }
}
