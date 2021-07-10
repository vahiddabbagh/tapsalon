<?php

namespace App\Http\Controllers\API;


use App\Place;
use App\PlaceType;
use App\PlaceField;
use App\PlaceFacility;
use App\Timing;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Place::class, 'place');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Place::with('place_type', 'complex', 'featured', 'fields', 'facilities')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $place = Place::create($input);
        $fields = $request->fields;
        if($fields){
            foreach($fields as $field){
                PlaceField::create(array('place_id' => $place->id, 'field_id' => $field));
            }
        };
        $facilities = $request->facilities;
        if($facilities){
            foreach($facilities as $facility){
                PlaceFacility::create(array('place_id' => $place->id, 'facility_id' => $facility));
            }
        };
        return $place;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        
        return $place->load('complex','place_type', 'featured', 'image', 'fields', 'facilities');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $input = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $place->update($input);
        $fields = $request->fields;
        if($fields){
           PlaceField::where('place_id', $place->id)->delete();
           foreach($fields as $field){
            PlaceField::create(array('place_id' => $place->id, 'field_id' => $field));
            }
           
        };
        $facilities = $request->facilities;
        if($facilities){
           PlaceFacility::where('place_id', $place->id)->delete();
           foreach($facilities as $facility){
            PlaceFacility::create(array('place_id' => $place->id, 'facility_id' => $facility));
            }
           
        };
        return response(['message'=> 'Updated!'], 400);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
       
        $place->delete();
        return \response(['id' => $place->id, 'content' => 'مکان ورزشی حذف شد'], 200);
    }


    /**
     * Return the user of a Place
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function user(Place $place)
    {
        return $place->users()->paginate(10);
    }


     /**
     * Return the field of a Place
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function fields(Place $place)
    {
        return $place->fields()->paginate(10);
    }

    public function facilities(Place $place)
    {
        return $place->facilities()->paginate(10);
    }


    public function salons()
    {
        return PlaceType::salons()->paginate(10)->load('complex', 'place_type')->all();
    }

    public function bashgahs()
    {
        return PlaceType::bashgahs()->paginate(10)->load('complex', 'place_type')->all();
    }

    public function funcomplexes()
    {
        return PlaceType::funcomplexes()->paginate(10)->load('complex', 'place_type')->all();
    }

    public function timings(Place $place){
		
        $request = request();
        $start = $request->start;
        $end = $request->end;
        return Timing::where('place_id', $place->id)->whereBetween('date_start', [$start, $end])->get();
    }

}
