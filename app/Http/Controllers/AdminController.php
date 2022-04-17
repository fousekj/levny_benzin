<?php

namespace App\Http\Controllers;

use App\Models\GasStation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function list()
    {
        return view('admin.list', [
            'gasStations' => GasStation::query()->orderBy('id')->get()
        ]);
    }

    public function edit($id)
    {
        return view('admin.edit', [
            'gasStation' => GasStation::query()->findOrFail($id),
            'companies' => GasStation::query()->findOrFail($id)->company
        ]);
    }
}
