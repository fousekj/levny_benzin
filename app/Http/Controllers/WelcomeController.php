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
    public function home(): View
    {
        return view('welcome.home', ['gasStationCheapestDiesel' => GasStation::query()->where('priceDiesel', '>', '0')->orderBy('priceDiesel', 'asc')->first(),
                'gasStationCheapestPetrol' => GasStation::query()->where('pricePetrol', '>', '0')->orderBy('pricePetrol', 'asc')->first()
        ]);
    }

    public function list()
    {
        return view('welcome.list', [
            'gasStations' => GasStation::orderBy('id', 'asc')->get()
        ]);
    }

    public function show($id)
    {
        return view('welcome.show', [
            'gasStation' => GasStation::query()->findOrFail($id),
            'company' => GasStation::query()->findOrFail($id)->company
        ]);
    }
}
