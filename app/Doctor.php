<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected  $table ='doctors';

    protected $fillable = ['name', 'title','gender','hospital_id','medical_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at','hospital_id','pivot'];

    public $timestamps = false;


    ####### Accessors (getter) (perform changes in field value come from database)#######################3

    public function getGenderAttribute($value){
        return $value == 'f' ? 'Female' : 'male';
    }

    ####### Mutators (setter) (perform changes in field sending to database)#######################3
    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }

    ############### START RELATIONS ###########

    public function hospital(){
        return $this->belongsTo('App\Hospital','hospital_id','id');
    }

    public function services(){
        return $this->belongsToMany('App\Service','doctor_service','doctor_id','service_id');
    }


    public function patient(){
        return $this->hasOneThrough('App\Patient','App\MedicalProfile','patient_id','id');

    }

    ############### END RELATIONS #############

}
