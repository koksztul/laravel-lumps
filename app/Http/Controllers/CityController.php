<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Shop;
use App\Models\Voivodship;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($voivodship, $city)
    {
        $shops = Shop::whereHas('city', function ($query) use ($city) {
            $query->where('name', '=', $city);
        })->get();

        if (empty($shops[0])) {
            abort(404, 'The comments does not exist.');
        }
        if ($shops[0]->city->voivodship->name == $voivodship) {
            return view('pages.city', compact('shops'));
        } else {
            abort(404, 'The comments does not exist.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCities(Request $request)
    {
        $search = $request->search;
        $voivodship = Voivodship::whereName($request->voivodshipName)->firstOrFail();

        if ($search == '') {
            $Cities = City::where('voivodship_id', $voivodship->id)
                ->orderby('name', 'asc')
                ->select('name')
                ->limit(5)
                ->get();
        } else {
            $Cities = City::where('voivodship_id', $voivodship->id)
                ->orderby('name', 'asc')
                ->select('name')
                ->where('name', 'like', $search . '%')
                ->limit(5)
                ->get();
        }

        $response = array();
        foreach ($Cities as $city) {
            $response[] = array("label" => $city->name);
        }
        return response()->json($response);
    }
}
