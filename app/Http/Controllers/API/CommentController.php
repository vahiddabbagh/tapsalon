<?php

namespace App\Http\Controllers\API;


use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::with('user')->paginate(10);
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
        $comment = Comment::create($input);
        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return $comment->load('user');
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $input = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $comment = $comment->update($input);
        if($comment){
            return response(['message'=> 'updated'], 200);
        }
        return response(['message'=> 'Problem occured!'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return \response(['id' => $comment->id, 'content' => 'نظر شما حذف گردید'], 200);
    }
}
