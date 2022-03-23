<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected  $table ='services';

    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at','pivot'];

    public $timestamps = true;

    ############### START RELATIONS ###########

    public function doctors(){
        return $this->belongsToMany('App\Doctor','doctor_service','service_id','doctor_id');
    }


    ############### END RELATIONS #############
}
