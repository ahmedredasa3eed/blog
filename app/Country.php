<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected  $table ='countries';

    protected $fillable = ['name'];
    protected $hidden = [''];

    public $timestamps = false;

    ############### hasManyThrough START RELATIONS ###########

    public function doctors(){
        return $this->hasManyThrough('App\Doctor','App\Hospital','country_id','hospital_id');
    }

    ############### has Many START RELATIONS ###########
    public function hospitals(){
        return $this->hasMany('App\Hospital','country_id');
    }

}
