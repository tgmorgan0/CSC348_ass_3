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
    @if($errors->any()) 
        <div>
            Errors:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    <form method="POST" action="{{route('posts.store')}}" enctype=”multipart/form-data”>
        @csrf
        <textarea rows="2" cols="75" name="post_text">Post Text: </textarea><br>
        <input type="submit" value="Create Post">
    </form>
    @if(session('message'))
        <p><b>{{session('message')}}</b></p>
    @endif
    
@endsection

@section('posts')
    <br>
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

                    <textarea rows="2" cols="75" name="post_text">{{$post->post_text}}</textarea><br>
                    <input type="submit" value="Edit Post">
                </form>
                <form action="{{ url('uploadimage', $post->id)}}" method="GET">
                    <input type="submit" value="Add Image to Post">
                </form><br>
            @else
                <li>{{$post->post_text}}</li>
            @endif
            
            @if(!empty($post->photo_id))
                <img src = "{{asset('storage/images/HTjFZDdtXhJed3gzVAdb5feW7Cm9odPYi97cysPU.png')}}"></img>
            @endif
            <li>Posted by:  {{$post->user->name}}</li>            
    </ul> 
@endsection            

@section('comments title')
    <h5>Comments related to post</h5>
@endsection

@section('comments')
            <form action="{{route('comments.store', $post->id)}}" method="POST">
                @csrf
                
                <textarea rows="2" cols="75" name="comment_text"></textarea><br>
                <input type=submit value="Submit Comment"></input>
            </form>
            @if(!empty($post->comments))
                @foreach($post->comments as $comment)
                    @if($user->id==$comment->user_id)
                        <form action="{{route('comments.update', $comment->id)}}" method="POST">
                            @csrf
                            @method("PUT")

                            <textarea rows="2" cols="75" name="comment_text">{{$comment->comment_text}}</textarea><br>
                            <input type="submit" value="Edit Comment">
                        </form>
					@else
                        <li>{{$comment->comment_text}}</li>
                    @endif
                    <li>user: {{$comment->user->name}}</li>
                    @if(!empty($comment->likes))
                        <p>Number of Likes: {{$comment->likes->count()}}</p>
                    @endif
                    <form method="POST" action="{{route('likes.store', $comment->id)}}">
                        @csrf
                        <input type="submit" value="Like">
                    </form>
                    <br><br>
                @endforeach
            @endif
        @endforeach 
@endsection 

@section('links')
    {{$posts->links()}}
@endsection

@section('note heading', 'Notifications')
@section('note body')
    <ul>
        @foreach($user->notifications as $notification)
            @if($notification->notifiable_type=='App\Models\Post')
                <li><a href="{{route('notifications.destroy', $notification->id)}}">Someone has commented on your post: &quot{{Str::substr($notification->notifiable->post_text, 0, 20)}}&quot </a></li>
            @else
                <li><a href="{{route('notifications.destroy', $notification->id)}}">Someone has liked your comment: &quot{{Str::substr($notification->notifiable->comment_text, 0, 20)}}&quot</a></li>
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
