<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceCategoriesTowns extends Model
{
    protected $table='placescategoriestowns';
    protected $fillable=['idplace','idcategory','idtown','lat','lon'];
    public function places(){
    	return $this->hasOne('App\Places','id','idplace');
    }
    public function towns(){
    	return $this->hasOne('App\Towns','id','idtown');
    }
    public function categories(){
    	return $this->hasOne('App\Categories','id','idcategory');
    }
}
