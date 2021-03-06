<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GasStation\StoreRequest;
use App\Http\Requests\GasStation\UpdateRequest;
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
        return view('gasStation.index', [
            'gasStations' => GasStation::query()->orderBy('id')->get()
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
            //'gasStation' => GasStation::all(),
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
        GasStation::query()->create([
            'company_id' => $request->company_id,
            'street' => $request->street,
            'city' => $request->city,
            'priceDiesel' => $request->priceDiesel ?? '0.0',
            'priceDieselSpecial' => $request->priceDieselSpecial ?? '0.0',
            'pricePetrol' => $request->pricePetrol ?? '0.0',
            'pricePetrolSpecial' => $request->pricePetrolSpecial ?? '0.0',
            'priceCNG' => $request->priceCNG ?? '0.0',
            'priceLPG' => $request->priceLPG ?? '0.0',
        ]);

        return redirect(route('admin.list'))->with('message', '??erpac?? stanice byla ??sp????n?? vytvo??ena');
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
        return view('gasStation.edit', [
            'gasStation' => GasStation::query()->findOrFail($id),
            'company' => GasStation::query()->findOrFail($id)->company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, $id)
    {

        if ($request->filled('priceDiesel'))
            GasStation::query()->where(['id' => $id])->update(['priceDiesel' => $request->priceDiesel]);

        if ($request->filled('priceDieselSpecial'))
            GasStation::query()->where(['id' => $id])->update(['priceDieselSpecial' => $request->priceDieselSpecial]);

        if ($request->filled('pricePetrol'))
            GasStation::query()->where(['id' => $id])->update(['pricePetrol' => $request->pricePetrol]);

        if ($request->filled('pricePetrolSpecial'))
            GasStation::query()->where(['id' => $id])->update(['pricePetrolSpecial' => $request->pricePetrolSpecial]);

        if ($request->filled('priceCNG'))
            GasStation::query()->where(['id' => $id])->update(['priceCNG' => $request->priceCNG]);

        if ($request->filled('priceLPG'))
            GasStation::query()->where(['id' => $id])->update(['priceLPG' => $request->priceLPG]);

        return redirect()->back()->with('message', 'Ceny ??sp????n?? aktualizov??ny!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            GasStation::query()->where('id', $id)->delete();
        } catch (Exception $exception) {
            redirect(back())->withErrors('Do??lo k chyb?? p??i odstra??ov??n?? ??l??nku.');
        }

        return redirect()->route('admin.list')->with('message', '??erpac?? stanice ??sp????n?? smaz??na.');
    }
}
