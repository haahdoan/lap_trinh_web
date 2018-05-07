<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    // public function loaiTin(){
    //     return $this->belongsTo('App\LoaiTin','idLoaiTin','id');
    // }

    public function comment(){
        return $this->hasMany('App\Comment','idPost','id');
    }

    public function user(){
        return $this->belongsTo('App\User','idUser','id');
    }
}
