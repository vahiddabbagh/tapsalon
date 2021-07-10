<?php

namespace App\Http\Controllers\API;

use App\Complex;
use App\Place;
use Illuminate\Http\Request;


class ComplexController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Complex::with('user','places','ostan', 'city', 'region', 'featured')->paginate(10);
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
        $complex = Complex::create($input);
        return $complex;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function show(Complex $complex)
    {
        return $complex->load('user','places','ostan', 'city', 'region', 'featured', 'image');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complex $complex)
    {
        $input = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $complex = $complex->update($input);
        if($complex){
            return response(['message'=> 'updated'], 200);
        }
        return response(['message'=> 'Problem occured!'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complex $complex)
    {
        $complex->delete();
        return \response(['id' => $complex->id, 'content' => 'مکان ورزشی حذف شد'], 200);
    }

                 /**
     * Return the facility of a Place
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function places(Complex $complex)
    {
        return $complex->places()->paginate(10);
    }

    public function likes(Complex $complex)
    {
        return $complex->likes()->paginate(10);
    }


    public function comments(Complex $complex)
    {
        return $complex->comments()->with('user')->paginate(10);
    }

    public function notifications(Complex $complex)
    {
        return $complex->notifications()->paginate(10);
    }

    public function search(Request $request)
    {

        $query = new Complex;
        $querys = collect($request->only('name', 'ostan', 'city', 'region', 'orderby', 'sort', 'field', 'facility', 'type', 'range'));
        foreach ($querys as $key => $value) {
            switch ($key) {
                case 'name':
                    $query = $query->where('name', 'like', '%'.$value.'%');
                    break;

                case 'ostan':
                    $query = $query->whereIn('ostan_id', explode(',', $value));
                    break;  
                    
                case 'city':
                    $query = $query->whereIn('city_id', explode(',', $value));
                    break;  

                case 'region':
                    $query = $query->whereIn('region_id', explode(',', $value));
                    break;   

                case 'type':
                        $values = explode(',', $value);
                        foreach($values as $value){
                            $query = $query->whereHas('places',function($query) use ($value){
                                $query->whereHas('place_type', function($query) use ($value){
                                        $query->where('id', $value);
                                }); 
                         });  
                        }
                        break;     
                        
                case 'field':
                    $values = explode(',', $value);
                    foreach($values as $value){
                        $query = $query->whereHas('places',function($query) use ($value){
                            $query->whereHas('fields', function($query) use ($value){
                                    $query->where('id', $value);
                            }); 
                     });  
                    }
                    break;     
                    
                case 'facility':
                    $values = explode(',', $value);
                    foreach($values as $value){
                        $query = $query->whereHas('places',function($query) use ($value){
                            $query->whereHas('facilities', function($query) use ($value){
                                    $query->where('id', $value);
                            }); 
                     });  
                    }
                    break;     
                    
                case 'range':
                    $range = explode(',', $value);
                    $query = $query->whereHas('places', function($query) use ($range){
                        $query->whereBetween('price', $range);
                    });                        
                    break;     
            }
        }

        if($querys->has('orderby')){
            
            $default = collect(['name', 'likes_no', 'visits_no', 'stars']);
            if(!$default->contains($querys->get('orderby'))){
                return response('orderby must be one of the name, likes_no, visits_no, stars');
            }

            $query = $query->orderBy($querys->get('orderby'));

            if($querys->has('sort') && $querys->contains('sort', 'ASC')){
                $query = $query->orderBy($query->get('orderby'), 'ASC');
            }

            if($querys->has('sort') && $querys->contains('sort', 'DES')){
                $query = $query->orderBy($query->get('orderby'), 'DES');
            }
        }
    
        return $query->with('region', 'featured', 'places')->paginate($request->per_page);
        
    }

    public function range(){

        $min = Place::min('price');
        $max = Place::max('price');

        return array('min'=>$min, 'max' => $max);
    }


}
