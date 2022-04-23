<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Photo;
use App\Models\Post;

class UploadImageController extends Controller
{
    public function index($id)
    {
        return view('image')->with('id',$id);
    }
 
    public function save(Request $request, $id)
    {
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/images');
 
 
        $save = new Photo;
 
        $save->name = $name;
        $save->path = $path;
 
        $save->save();

        $a=Post::find($id);
        $a->photo_id=$save->id;
        $a->save();
 
        return redirect('post')->with('status', 'Image Has been uploaded');
    }
}