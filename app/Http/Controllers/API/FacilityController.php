<?php

namespace App\Http\Controllers\API;


use App\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Facility::paginate(10);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facility = Facility::create($request->all());
        return \response(['id' => $facility->id, 'content' => 'ایجاد شد'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        return $facility; 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $facility->update($request->all());
        return \response(['id' => $facility->id, 'content' => 'اصلاح شد'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();
        return \response(['id' => $facility->id, 'content' => 'حذف شد'], 200);
    }
}
