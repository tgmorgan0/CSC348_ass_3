@extends('layouts.app')

@section('title', 'Posts')

@section('welcome')
    @if(!empty($user=auth()->user()))
        <p>Welcome {{$user->name}}</p>
    @else
        <p>Login expired, try again</p>
    @endif
@endsection

@section('create')
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <p>Text: <input type="text" name="post_text"></p>
        <p>Image: <input type="text" name="post_image"></p>
        <input type="submit" value="Submit">
    </form>
    @if(session('message'))
        <p><b>{{session('message')}}</b></p>
    @endif
@endsection

@section('content')
    <p>List of all Posts</p>
    <ul>
        @foreach($posts as $post)
            <form action="{{route('posts.destroy', $post->id)}}" method="POST" >
                @csrf
                @method("DELETE")
                
                <input type="submit" value="Delete">
            </form>
            <form action="{{route('posts.update', $post->id)}}" method="POST">
                @csrf
                @method("PUT")

                <input type="text" size=75 value="{{$post->post_text}}">
                <input type="submit" value="Edit Post">
            </form>
            <form action="{{route('comments.store', $post->id)}}" method="POST">
                @csrf
                <input type="text" name="comment_text">
                <input type=submit value="Submit Comment"></input>
            </form>
            <li>{{$post->post_text}}</li>
            <li>{{$post->post_image}}</li>
            <li>{{$post->id}}</li>
            <li>{{$post->user_id}}</li>
            <li>{{$post->user->name}}</li>

            @if(!empty($post->comments))
                @foreach($post->comments as $comment)
                    <form action="{{route('comments.update', $comment->id)}}" method="POST">
                        @csrf
                        @method("PUT")

                        <input type="text" size=75 value="{{$comment->comment_text}}">
                        <input type="submit" value="Edit Comment">
                    </form>
					
                    <li>{{$comment->comment_text}}</li>
                    <li>user: {{$comment->user->name}}</li>
                    @if(!empty($comment->likes))
                        @foreach($comment->likes as $like)     
                            <li>{{$like->count()}}</li>
                        @endforeach
                    @endif
                @endforeach
            @endif
            <br><br>  
        @endforeach
    </ul>

    
@endsection 

@section('note heading', 'Notifications')
@section('note body')
    @foreach($user->notifications as $notification)
        <p>{{$notification->id}}<p>
    @endforeach
@endsection

@section('inter heading', 'Interests')
@section('inter body')
    <ul>
        @foreach($user->interests as $interest)
            <li>{{$interest->interest}}</li>
        @endforeach
    </ul>
@endsection
