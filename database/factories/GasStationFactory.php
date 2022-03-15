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
            'priceDiesel' => rand(350, 500) / 10,
            'priceDieselSpecial' => rand(350, 500) / 10,
            'pricePetrol' => rand(350, 500) / 10,
            'pricePetrolSpecial' => rand(350, 500) / 10,
            'priceLPG' => rand(350, 500) / 10,
            'priceCNG' => rand(350, 500) / 10,
        ];
    }


}
