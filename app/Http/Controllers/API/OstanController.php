<?php

namespace App\Http\Controllers\API;


use App\Ostan;
use Illuminate\Http\Request;

class OstanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ostan::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ostan = Ostan::create($request->all());
        return \response(['id' => $ostan->id, 'content' => 'استان ایجاد شد'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Ostan $ostan)
    {
        return $ostan;
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ostan $ostan)
    {
        return \response(['id' => $ostan->id, 'content' => 'اصلاح گردید'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ostan $ostan)
    {
        $ostan->delete();
        return \response(['id' => $ostan->id, 'content' => 'استان حذف شد'], 200);
    }


    public function cities(Ostan $ostan){

        return $ostan->cities;
    }
}
