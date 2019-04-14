<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
      return view('photos.create',compact('album_id'));
    }

    public function store(Request $request){
      $this->validate($request,
                     [
                       'title'             => 'required',
                       'description'       => 'required',
                       'photo'             => 'image|max:1999',
                       ]);


      //Get file name with extension
      $fileNameWithExtension = $request->file('photo')->getClientOriginalName();

      //get file name without extension
      $fileName   = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);

      //get extension only
      $extension  =  $request->file('photo')->getClientOriginalExtension();

     //file name to store
     $fileNameToStore = $fileName.'_'.time().'.'.$extension;

     //upload path
     $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$fileNameToStore);

     $photo = new Photo();
     $photo->title       = $request->input('title');
     $photo->album_id    = $request->input('album_id');
     $photo->description = $request->input('description');
     $photo->size        = $request->file('photo')->getClientSize();
     $photo->photo       = $fileNameToStore;
     $photo->save();
     return redirect('/albums/'.$request->input('album_id'))->with('success','Photo Success');


    }



    public function show($id){
      $photo = Photo::findOrFail($id);
      return view('photos.show',compact('photo'));
    }

    public function destroy($id){

      $photo = Photo::findOrFail($id);
      if(Storage::delete('/public/photos/'.$photo->album_id.'/'.$photo->photo)){
        $photo->delete();
      }
      return redirect('/')->with('success','Photo Removed');
    }
}
