<?php

namespace App\Http\Controllers;

use App\Models\GasStation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function home(): View
    {
        return view('user.home', ['gasStationCheapestDiesel' => GasStation::query()->where('priceDiesel', '>', '0')->orderBy('priceDiesel', 'asc')->first(),
            'gasStationCheapestPetrol' => GasStation::query()->where('pricePetrol', '>', '0')->orderBy('pricePetrol', 'asc')->first()
        ]);
    }

    public function list()
    {
        return view('user.list', [
            'gasStations' => GasStation::orderBy('id', 'asc')->get()
        ]);
    }

    public function show($id)
    {
        return view('user.show', [
            'gasStation' => GasStation::query()->findOrFail($id),
            'company' => GasStation::query()->findOrFail($id)->company
        ]);
    }

    public function edit($id)
    {
        return view('user.editPrices', [
            'gasStation' => GasStation::query()->findOrFail($id),
            'company' => GasStation::query()->findOrFail($id)->company
        ]);
    }

}
