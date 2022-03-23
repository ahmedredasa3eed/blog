<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected  $table ='patients';

    protected $fillable = ['name', 'age'];
    protected $hidden = [''];

    public $timestamps = false;


    ############# HAS ONE THROUGH RELATION #########

    public function doctor(){
        return $this->hasOneThrough('App\Doctor','App\MedicalProfile','patient_id','medical_id');
    }


}
