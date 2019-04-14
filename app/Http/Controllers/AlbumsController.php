<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Album;
class AlbumsController extends Controller
{
   public function index(){

     //By using the relationship that called photos we can do this
     $albums = Album::with('photos')->get();
     return view('albums.index')->with('albums',$albums);
   }

   public function create(){

     return view('albums.create');
   }

   public function store(Request $request){

     $this->validate($request,[
       'name'           => 'required',
       'description'    => 'required',
       'cover_image '   => 'image|max:1999',
     ]);
     //Get file name with extension
     $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();

     //Get file name without extension
     $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);

     //Get extension
     $extension = $request->file('cover_image')->getClientOriginalExtension();

     //create file name
     $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    //upload Image

    $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

    $albums = new Album;
    $albums->name         = $request->input('name');
    $albums->description  = $request->input('description');
    $albums->cover_image  = $fileNameToStore;
    $albums->save();
    return redirect()->intended('/')->with('success','Album Created');


   }


   public function show($id){

     $album = Album::with('photos')->find($id);
     return view('albums.show',compact('album'));


   }
}
