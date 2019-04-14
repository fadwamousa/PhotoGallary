<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title','description','album_id','size','photo'];

    public function album(){
      return $this->belongsTo(Album::class);
    }
}
