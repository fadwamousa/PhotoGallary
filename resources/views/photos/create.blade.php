@extends('layouts.app')
@section('title','Form Page')
@section('content')
<h3>Upload Photo</h3>
{!!Form::open(['method'=>'POST','action'=>'PhotosController@store','files' => true])!!}
<div class="form-group">


  {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Your Title Photo'])}}

</div>
<div class="form-group">


  {{Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Your Detail Photo'])}}

</div>


<div class="form-group">


  {{Form::file('photo',null,['class'=>'form-control'])}}

</div>

{{Form::hidden('album_id',$album_id)}}

<div class="form-group">


  {{Form::submit('upload',['class'=>'btn btn-info'])}}

</div>
{!!Form::close()!!}
@endsection
