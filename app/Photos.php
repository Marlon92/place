<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table='photos';
    protected $fillable=['idplace','photo'];

    public function places(){
    	return $this->hasOne('App\Places','id','idplace');
    }
}
