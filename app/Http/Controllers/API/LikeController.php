<?php

namespace App\Http\Controllers\API;


use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Like::paginate(10);
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
        $like = Like::create($input);
        return $like;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        return $like;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $user_id = $request->user()->id;
        $complex_id = $request->complex_id;

        if(Complex::where('user_id', $user_id)->where('complex_id', $complex_id)->delete()){
            return response(['message' => 'Successfully deleted'], 200);
        }

    }
}
