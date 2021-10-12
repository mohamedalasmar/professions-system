<?php

namespace Database\Seeders;

use App\Models\Specaility;
use Illuminate\Database\Seeder;

class SpecailitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specaility::factory(10)->create();
    }
}
