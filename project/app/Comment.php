<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    public function post() {
    	return $this->belongTo('App\post', 'idPost', 'id');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }
}
