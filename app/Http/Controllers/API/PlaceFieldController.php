<?php

namespace App\Http\Controllers;

use App\PlaceField;
use Illuminate\Http\Request;

class PlaceFieldController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $placefield = PlaceField::create($request);
        return $placefield;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       PlaceField::where('place_id', $request->place_id)->where('field_id', $request->field_id)->delete();
        return \response(['id' => $place->id, 'content' => 'مکان ورزشی حذف شد'], 200);
    }
}
