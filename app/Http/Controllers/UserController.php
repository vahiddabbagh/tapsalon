<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Library\Services\Sms;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with('ostan', 'city', 'role')->paginate(10);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return \response(['id' => $user->id, 'content' => 'ایجاد گردید'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user->load('ostan', 'city', 'role');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        return \response(['id' => $user->id, 'content' => 'ایجاد گردید'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return \response(['id' => $user->id, 'content' => 'ایجاد گردید'], 200);
    }


        /**
     * Return the places of a User
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function complexes(User $user)
    {
        return \response(['id' => $user->id, 'places' => $user->complexes], 200);
    }


    
    /**
     * Return the likes of a User
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function likes(User $user)
    {
        return \response(['id' => $user->id, 'likes' => $user->likes], 200);
    }

        /**
     * Return the comments of a User
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function comments(User $user)
    {
        return \response(['id' => $user->id, 'comments' => $user->complexes()->with('comments')->get()], 200);
    }

            /**
     * Return the comments of a User
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function transactions(User $user)
    {
        return \response(['id' => $user->id, 'transactions' => $user->transactions], 200);
    }

    /**
     * Return the notifications of a User
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function notifications(User $user)
    {
        return \response(['id' => $user->id, 'notifications' => $user->complexes->notifications], 200);
    }



    public function sendSms(Sms $sms){

        return $sms->sendSms();
    }


}
