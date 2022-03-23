<?php

namespace App\Http\Controllers\Relations;

use App\Country;
use App\Doctor;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Phone;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    public function hasOneRelation(){

         //$user = User::with('mobile')->find(5);
         //return $user->mobile->number;

        $user = User::with(['mobile'=> function($query){
            $query->select('number','code','user_id');
        }])->find(7);
        //return $user->mobile;
        return response()->json($user);
    }

    public function hasOneRelationReverse(){

        //return Phone::find(1);
        $phone =  Phone::with('user')->find(1);

        //Maks some fields visbile or hidden in response;
        $phone->makeVisible(['user_id']);
        $phone->makeHidden(['code']);

        // return  $phone->user->name;
        return $phone;

    }

    public function getUserOwnsMobile(){

        //return all users where/doesn't have mobile record

        //return User::whereHas('mobile')->get();
        return User::whereHas('mobile',function ($q){
            $q->where('code','02');
        })->get();
        //return User::whereDoesntHave('mobile')->get();
    }




    ################ ONE TO MANY ###############

    public function getAllDoctorDetails(){
        $doctors = Doctor::with('hospital')->get();
        //$doctors->makeHidden('name');
        return view('medical.allDoctors',compact('doctors'));
    }

    public function getOneDoctor($doctor_id){
        $doctor = Doctor::with('hospital')->find($doctor_id);
        return view('medical.doctor',compact('doctor'));
    }

    public function getAllHospitalInfo(){
        $hospitals = Hospital::with('doctors')->get();
        //$hospitals->makeHidden('name');
        return view('medical.hospital',compact('hospitals'));
    }

    public function getDoctorsInSelectedHospital($hospital_id){
        //$hospital_doctors = Hospital::with('doctors')->find($hospital_id);
        //$doctors = $hospital_doctors->doctors;

        $hospital = Hospital::find($hospital_id);
        $doctors = $hospital->doctors;
        return view('medical.doctors_by_hospital',compact('doctors'));
    }

    public function getHospitalThatHaveDoctorsOnly(){
       // return $hospital = Hospital::whereHas('doctors')->get();
       //return $hospital = Hospital::whereHas('doctors',function ($q){$q->where('gender','f');})->get();
        return $hospital = Hospital::with('doctors')->whereHas('doctors',function ($q){
            $q->where('gender','f');
        })->get();
       //return $hospital = Hospital::whereDoesntHave('doctors')->get();
    }

    public function deleteHospital($hospital_id){
        $hospital = Hospital::find($hospital_id);
        if(!$hospital)
            return abort('404');
        $hospital->doctors()->delete();
        $hospital->delete();
        return  redirect()->route('getAllHospitalInfo');
    }



    ######## MANY TO MANY ###########

    public function getDoctorServices(){
       // $doctors = Service::with('doctors')->find(1);
      //  return  $services = Service::find(1);
       // return  $services = Service::get();
        //$doctors = Service::whereHas('doctors')->get();
       // $doctors = Service::whereDoesntHave('doctors')->get();
        $doctors = Service::with(['doctors'=>function($q){
            $q->select('doctors.id','name');
        }])->find(1);
        if(!$doctors)
            return abort('404');
        return $doctors;

    }

    public function doctorServices($doctor_id){

        //$doctorServices = Doctor::with('services')->find($doctor_id);
         $doctorServices = Doctor::find($doctor_id);
         $services = $doctorServices->services;

         $allDoctors = Doctor::get();
         $allServices = Service::get();
        return view('medical.doctors_services',compact('services','allServices','allDoctors'));
    }

    public function saveDoctorServices(Request  $request){

         $doctor = Doctor::find($request->doctor_id);

         ## Many to many insert to database
         # (may duplicate data even if data is exist before);
        //$doctor->services()->attach($request->service_id);

        ## Many to many insert(update current data with new selected data)
        # to database
        //$doctor->services()->sync($request->service_id);

        ## Many to many insert to database
        # with save old data and add the new one with check if this new data exist
        # or not
        $doctor->services()->syncWithOutDetaching($request->service_id);
        return 'OKAY';
    }



    ####################### HAS ONE THROUGH RELATION ############

    public function getDoctorOfPatients(){

         $patient = Patient::find(1);
         //$patient = Patient::with('doctor')->find(1);
        return  $patient->doctor;
    }

    public function getPatientOfDoctor(){
         $doctor = Doctor::find(1);
         //$doctor = Doctor::with('patient')->find(2);
        return $doctor->patient;
    }

    ####################### HAS MANY THROUGH RELATION ############

    public function getDoctorsOfCountry(){
        // $country = Country::find(2);
        return $country = Country::with('doctors')->find(2);
        return $country->doctors;
    }

    public function getHospitalOfCountry(){
        return $country = Country::with('hospitals')->find(1);
    }

}
