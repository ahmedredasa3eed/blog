<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected  $table ='hospitals';

    protected $fillable = ['name', 'address','country_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];

    public $timestamps = true;

    ############### START RELATIONS ###########

    public function doctors(){
        return $this->hasMany('App\Doctor','hospital_id','id');
    }


    ############### END RELATIONS #############

}
