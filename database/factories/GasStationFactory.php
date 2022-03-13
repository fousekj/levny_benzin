<?php

namespace Database\Factories;

use App\Models\GasStation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GasStation>
 */
class GasStationFactory extends Factory
{

    protected $model = GasStation::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => rand(1,6),
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'priceDiesel' => rand(3500, 5000) / 100,
            'priceDieselSpecial' => rand(3500, 5000) / 100,
            'pricePetrol' => rand(3500, 5000) / 100,
            'pricePetrolSpecial' => rand(3500, 5000) / 100,
            'priceLPG' => rand(3500, 5000) / 100,
            'priceCNG' => rand(3500, 5000) / 100,
        ];
    }


}
