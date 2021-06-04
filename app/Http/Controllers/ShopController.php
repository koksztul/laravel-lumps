<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Voivodship;
use App\Models\Image;
use Exception;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voivodships = Voivodship::has('cities')->get();
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
        $voivodship = Voivodship::whereName($request->input('voivodship'))->firstOrFail();

        $city = City::whereName($request->input('city'))->firstOrFail();

        $data = $request->except(['images', 'city', 'voivodship', 'voivodship_id']);
        $data['city_id'] = $city->id;

        $shop = Shop::create($data);

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('photos');
                $shop->images()->create([
                    'url' => $path,
                    ]);
            }
        }
        return redirect(route('shop.show', [$voivodship->name, $city->name, $shop->id]));
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
    public function edit($voivodship, $city, Shop $shop)
    {
        $this->authorize('manage-shop', $shop);
        return view('pages.edit-shop', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopRequest $request, $voivodship, $city, Shop $shop)
    {
        $this->authorize('manage-shop', $shop);
        $voivodship = Voivodship::whereName($request->input('voivodship'))->firstOrFail();

        $city = City::whereName($request->input('city'))->firstOrFail();

        $data = Shop::findOrFail($shop->id);

        $data['city_id'] = $city->id;
        $data->update($request->except(['images', 'city', 'voivodship']));

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('photos');
                $shop->images()->create([
                    'url' => $path,
                    ]);
            }
        }
        return redirect(route('shop.show', [$voivodship->name, $city->name, $data->id]));
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

    public function rating(Request $request, $id)
    {
        if (Auth::user()) {
            try {
                $shop = Shop::findOrFail($id);
                $shop->rateOnce($request->rating);

                return response()->json([
                    'status' => 'success',
                    'averageRating' => $shop->averageRating,
                    'usersRated' => $shop->usersRated(),
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'error'
                ])->setStatusCode(500);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'unautchorized'
            ])->setStatusCode(419);
        }
    }
}
