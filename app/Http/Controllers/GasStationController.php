<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GasStation\StoreRequest;
use App\Models\Company;
use App\Models\GasStation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use mysql_xdevapi\Exception;

class GasStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        return view('gasStation.index', [
//            'gasStationDiesel' => GasStation::orderBy('priceDiesel', 'asc')->first(),
//            'company' => GasStation::orderBy('priceDiesel', 'asc')->first()->company
//        ]);

        return view('gasStation.index', [
            'gasStations' => GasStation::orderBy('id', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('gasStation.create', [
            'gasStations' => GasStation::all(),
            'companies' => Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(StoreRequest $request)
    {
        GasStation::create([
            'company_id' => $request->company_id,
            'street' => $request->street,
            'city' => $request->city,
            'priceDiesel' => $request->priceDiesel ?? '0.0',
            'priceDieselSpecial' => $request->priceDieselSpecial ?? '0.0',
            'pricePetrol' =>$request->pricePetrol ?? '0.0',
            'pricePetrolSpecial' =>$request->pricePetrolSpecial ?? '0.0',
            'priceCNG' =>$request->priceCNG ?? '0.0',
            'priceLPG' =>$request->priceLPG ?? '0.0',
        ]);

        return redirect()->route('gasStation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        return view('gasStation.show', [
            'gasStation' => GasStation::query()->findOrFail($id),
            'company' => GasStation::query()->findOrFail($id)->company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        return view('gasStation.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}