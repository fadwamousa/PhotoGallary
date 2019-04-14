@extends('layouts.app')
@section('title','Show Page')
@section('content')

<h3>{{$album->name}}</h3>
<a class="button secondary" href="{{url('/')}}">GO BACK</a>
<a class="button" href="/photos/create/{{$album->id}}">upload photo to album</a>
@endsection
