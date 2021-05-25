<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Models\Shop;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Voivodship;
use App\Models\Image;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voivodships = Voivodship::get();
        return view('pages.list', compact('voivodships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add-shop');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopRequest $request)
    {
        $voivodship = Voivodship::firstOrCreate(['name' => $request->input('voivodship')]);

        $city = City::firstOrCreate([
            'name' => $request->input('city'),
            'voivodship_id' => $voivodship->id
            ]);

        $data = $request->except(['image', 'city', 'voivodship']);
        $data['city_id'] = $city->id;

        $shop = Shop::create($data);

        Image::create([
            'url' => $request->input('image'),
            'imageable_id' => $shop->id,
            'imageable_type' => 'App\Models\Shop'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($voivodship, $city, Shop $shop)
    {
        if ($city == $shop->city->name && $voivodship == $shop->city->voivodship->name) {
            return view('pages.shop', compact('shop'));
        } else {
            abort(404, 'The comments does not exist.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
