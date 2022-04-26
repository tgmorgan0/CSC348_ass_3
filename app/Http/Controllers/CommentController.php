<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment_text' => 'required|max:255'
        ]);

        $a=New Comment();
        $a->user_id=$request->user()->id;
        $a->post_id=$id;
        $a->comment_text=$validatedData['comment_text'];
        $a->save();

        $notification = new Notification();
        $post=Post::find($a->post_id);
        $notification->user_id= $post->user_id;
        $notification->notifiable_id=$a->post_id;
        $notification->notifiable_type='App\Models\Post';
        $notification->save();
        return redirect()->route( 'posts.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $id)
    {
        $validatedData = $request->validate([
            'comment_text' => 'required|max:255'
        ]);

        $id->comment_text=$validatedData['comment_text'];
        $id->update();

        session()->flash('message','Comment was edited');
        return redirect()->route( 'posts.index' );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function page($id){
        return view('comments.index',['id'=>$id]);
    }

    public function apiIndex($id){
        $comments=Comment::query()->where('post_id', '=', "$id")->get();
        return $comments;
    }

    public function apiStore(Request $request){
        $e = new Comment();
        $e->user_id= $request['user_id'];
        $e->post_id= $request['post_id'];
        $e->comment_text = $request['comment_text'];
        $e->save();
        return $e;
    }

}
