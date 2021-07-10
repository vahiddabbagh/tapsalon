<?php

namespace App\Http\Controllers\API;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return City::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = City::create($request->all());
        return \response(['id' => $city->id, 'content' => 'شهر ایجاد شد'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return $city->load('ostan');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        return \response(['id' => $city->id, 'content' => 'ایجاد گردید'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return \response(['id' => $city->id, 'content' => 'شهر حذف شد'], 200);
    }


    public function regions(City $city){

        return $city->regions;
    }

    public function complexes(City $city){

        return $city->complexes()->with('places', 'region', 'featured')->get();
    }


}
