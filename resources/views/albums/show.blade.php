@extends('layouts.app')
@section('title','Show Page')
@section('content')

<h3>{{$album->name}}</h3>
<a class="button secondary" href="{{url('/')}}">GO BACK</a>
<a class="button" href="/photos/create/{{$album->id}}">upload photo to album</a>
<hr>
@if(count($album->photos) > 0)
  <?php
    $colcount = count($album->photos);
    $i = 1;
  ?>
  <div id="albums">
    <div class="row text-center">
      @foreach($album->photos as $photo)
        @if($i == $colcount)
           <div class='medium-4 columns end'>
             <a href="/photos/{{$photo->id}}">
                <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" width="340">
              </a>
             <br>
             <h4>{{$photo->name}}</h4>
        @else
          <div class='medium-4 columns'>
            <a href="/photos/{{$photo->id}}">
              <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->name}}" width="340">
            </a>
            <br>
            <h4>{{$photo->name}}</h4>
        @endif
        @if($i % 3 == 0)
        </div></div><div class="row text-center">
        @else
          </div>
        @endif
        <?php $i++; ?>
      @endforeach
    </div>
  </div>
@else
  <p>No Photos To Display</p>
@endif
@endsection
