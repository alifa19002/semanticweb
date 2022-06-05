<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class JobsDataController extends Controller
{
    public function index()
    {
        $data = new DataController();
        $dataAll = collect($data->getAllJobsData());
        $unique = $dataAll->unique('namaLengkap');
        $unique->values()->all();
        return view('index', compact('unique'));
    }

    public function search(Request $request)
    {
        $data = new DataController();
        $varsearch = $request->search;
        $search = $data->search($varsearch);
        return view('search_result', compact('search', 'varsearch'));
    }
    public function getPlacePosition(Request $request)
    {
        $data = new DataController();
        $place = $request->place;
        $position = $request->position;
        $varsearch = $place." dan ".$position;
        $search = $data->getSamePlacePosition($place, $position);
        return view('search_result', compact('search', 'varsearch'));
    }
}
