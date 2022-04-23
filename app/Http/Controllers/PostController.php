<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Interest;
use App\Models\Notification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        $comments=Post::find(1)->comments;
        $likes=Comment::find(1)->likes;
        $interests=Interest::all();
        $notifications=Notification::all();
        return view(
            'posts.index',
            ['posts'=>$posts],
            ['likes'=>$likes],
            ['interests'=>$interests],
            ['comments'=>$comments]
        );
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_text' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif'
        ]);

        $name = $request->file('image')->getClientOriginalName();

        $a=New Post();
        $a->user_id=$request->user()->id;
        $a->post_text=$validatedData['post_text'];
        $a->post_image=$name;
        $a->save();

        

        session()->flash('message','Post was created');
        return redirect()->route( 'posts.index' );

        
    
           $path = $request->file('post_image')->store('public/images');
    
    
           $a = new Post;
    
           $a->post_image = $path;
    
           $save->save();
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
    public function update(Request $request, Post $id)
    {
        $validatedData = $request->validate([
            'post_text' => 'required|max:255'
        ]);
        
        $id->post_text=$validatedData['post_text'];
        $id->update();

        session()->flash('message','Post was edited');
        return redirect()->route( 'posts.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $id)
    {
        $id->delete();

        session()->flash('message','Post was deleted');
        return redirect()->route( 'posts.index' );
    }
}
