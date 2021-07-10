<?php

namespace App\Http\Controllers\API;


use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Notification::paginate(10);
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
        $notification = Notification::create($input);
        return $notification;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        return $notification;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $input = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $notification = Notification::update($input);
        return $notification;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(notification $notification)
    {
        return \response(['id' => $notification->id, 'content' => 'ایجاد گردید'], 200);
    }
}
