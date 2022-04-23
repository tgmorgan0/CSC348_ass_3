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
    <form method="POST" action="{{route('posts.store')}}" enctype=”multipart/form-data”>
        @csrf
        <p>Text: <input type="text" name="post_text"></p>
        <p>Image: <input type="file" accept="image/*" name="image" class="form-control"></p>
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
            @if($user->userRole->role_type == "administrator")
            <form action="{{route('posts.destroy', $post->id)}}" method="POST" >
                @csrf
                @method("DELETE")
                
                <input type="submit" value="Delete">
            </form>
            @endif
            @if($user->id==$post->user_id)
                <form action="{{route('posts.update', $post->id)}}" method="POST">
                    @csrf
                    @method("PUT")

                    <input type="text" size=75 name="post_text" value="{{$post->post_text}}">
                    <input type="submit" value="Edit Post">
                </form>
                <form action="{{ url('uploadimage', $post->id)}}" method="GET">
                    <input type="submit" value="Add Image">
                </form>
            @else
                <li>{{$post->post_text}}</li>
            @endif
            <form action="{{route('comments.store', $post->id)}}" method="POST">
                @csrf
                <input type="text" name="comment_text">
                <input type=submit value="Submit Comment"></input>
            </form>
            @if(!empty($post->photo_id))
                <p>{{$post->photo->path}}</p>
                <p>{{$post->photo->name}}</p>
                {{asset("storage/app/public/images/HTjFZDdtXhJed3gzVAdb5feW7Cm9odPYi97cysPU.png")}}
                <img src="HTjFZDdtXhJed3gzVAdb5feW7Cm9odPYi97cysPU.png">
            @endif
            <li>{{$post->id}}</li>
            <li>{{$post->user_id}}</li>
            <li>{{$post->user->name}}</li>

            @if(!empty($post->comments))
                @foreach($post->comments as $comment)
                    @if($user->id==$comment->user_id)
                        <form action="{{route('comments.update', $comment->id)}}" method="POST">
                            @csrf
                            @method("PUT")

                            <input type="text" size=75 name = comment_text value="{{$comment->comment_text}}">
                            <input type="submit" value="Edit Comment">
                        </form>
					@else
                        <li>{{$comment->comment_text}}</li>
                    @endif
                    <li>user: {{$comment->user->name}}</li>
                    <form method="POST" action="{{route('likes.store', $comment->id)}}">
                        @csrf
                        <input type="submit" value="Like">
                    </form>  
                    @if(!empty($comment->likes))
                        <p>{{$comment->likes->count()}}</p>
                    @endif
                @endforeach
            @endif
            <br><br>
        @endforeach
    </ul>

    
@endsection 

@section('note heading', 'Notifications')
@section('note body')
    <ul>
        @foreach($user->notifications as $notification)
            @if($notification->notifiable_type=='App\Models\Post')
                <li><a href="{{route('notifications.destroy', $notification->id)}}">Someone has commented on your post</a></li>
            @else
                <li><a href="{{route('notifications.destroy', $notification->id)}}">Someone has liked your comment</a></li>
            @endif
            
        @endforeach
    </ul>
@endsection

@section('inter heading', 'Interests')
@section('inter body')
    <ul>
        @foreach($user->interests as $interest)
            <li>{{$interest->interest}}</li>
        @endforeach
    </ul>
@endsection
