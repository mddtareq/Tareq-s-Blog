@extends('layouts.app')
@section('content')
    <h1>{{$post->title}} </h1> 
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    <img style="width:25%" src="/storage/cover_images/{{$post->cover_image}}">
    <hr>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id==$post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!} 
        @endif 
    @endif
 
<hr>
    <a href="/posts" class="btn btn-default">Go Back</a>
@endsection