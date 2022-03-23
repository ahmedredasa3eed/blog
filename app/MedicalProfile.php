<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalProfile extends Model
{
    protected  $table ='medical_profiles';

    protected $fillable = ['pdf', 'patient_id'];
    protected $hidden = [''];

    public $timestamps = false;

}
