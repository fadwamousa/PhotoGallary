@extends('layouts.app')
@section('title','Show Page')
@section('content')

<h3>{{$photo->title}}</h3>
<p>{{$photo->description}}</p>
<a href="/albums/{{$photo->album_id}}">Back to Gallery</a>
<hr>
<img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" width="450">

<br> <br> <br>
{!!Form::open(['method'=>'DELETE','action'=>['PhotosController@destroy',$photo->id]])!!}
{{Form::submit('DELETE',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endsection
