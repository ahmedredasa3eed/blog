<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'mobiles';
    protected $fillable = ['code', 'number', 'user_id'];
    protected $hidden = ['user_id'];
    public $timestamps = false;


    ############### START RELATIONS ###########

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }


    ############### END RELATIONS #############


}



