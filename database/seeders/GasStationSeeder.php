<?php

namespace Database\Seeders;

use App\Models\GasStation;
use Database\Factories\GasStationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GasStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GasStation::factory()->count(10)->make();
    }
}
