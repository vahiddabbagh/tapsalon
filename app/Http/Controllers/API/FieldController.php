<?php

namespace App\Http\Controllers\API;


use App\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Field::paginate(10);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = Field::create($request->all());
        return \response(['id' => $field->id, 'content' => 'ایجاد شد'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        return $field;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        $field->update($request->all());
        return \response(['id' => $field->id, 'content' => 'اصلاح شد'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        $field->delete();
        return \response(['id' => $field->id, 'content' => 'خذف شد'], 200);
    }
}
