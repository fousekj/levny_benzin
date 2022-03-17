<?php

namespace App\Http\Controllers;

use App\Models\GasStation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Hlavní stránka webu
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('welcome', ['gasStationCheapestDiesel' => GasStation::orderBy('priceDiesel', 'asc')->first(),
                'gasStationCheapestPetrol' => GasStation::orderBy('pricePetrol', 'asc')->first()
        ]);
    }
}
