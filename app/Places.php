<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $table='places';
    protected $fillable=['name','password','address','website','description','idtown','lat','lon','cel1','cel2','email','photo','status'];
}
