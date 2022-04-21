@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p>List of all Posts</p>
    <ul>
        @foreach($posts as $post)
            <li>{{$post->post_image}}</li>
            <li>{{$post->post_text}}</li>
            <li>{{$post->id}}</li>
            <li>{{$post->user_id}}</li>
<!--             @foreach($comments as $comment)
                <li>{{$comment->comment_text}}<li>
            @endforeach -->

            @if(!empty($post->comments))
                @foreach($post->comments as $comment)     
                    <li>{{$comment->comment_text}}</li>
                @endforeach
            @endif
            <br>  
        @endforeach
    </ul>
@endsection 

@section('panel heading', 'Notifications')

@section('panel body')
    <p>test</p>
@endsection
