<?php

namespace App\Http\Controllers\Collections;

use App\Doctor;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function index(){
        $doctors = Doctor::get();
        //return collect($doctors)->sort();
        //return collect($doctors)->count();
        //return collect($doctors)->combine(['1','2','3','4','5']);

        $doctors->each(function ($doctor){
           //$doctor->name = 'Add';
           //unset($doctor->name);
           //$doctor->age = 20;
           /* if($doctor->gender == 'Female'){
                unset($doctor->name);
            }*/
           return $doctor;
        });
        return $doctors;
    }

    public function filter(){
        $doctors = Doctor::get();
        $doctorsCollection =  collect($doctors);
        $result = $doctorsCollection->filter(function ($value,$key){
            return $value['medical_id'] == Null;
        });
        //return $result->all();
        return array_values($result->all());
    }

    public function transform(){
        $doctors = Doctor::get();
        $doctorsCollection =  collect($doctors);
        $result = $doctorsCollection->transform(function ($value,$key){
            //seelct or add custom fields data in response
            $data=[];
            $data['title'] = $value['title'];
            $data['name'] = $value['name'];
            return $data;
            //return $value['name'];
        });
        return $result;
    }
}
