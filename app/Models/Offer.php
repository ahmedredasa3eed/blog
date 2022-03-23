<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected  $table = 'offers';

    protected $fillable = ['title_ar','title_en','price','photo','created_at','updated_at'];
    protected $hidden = ['created_at'];


    ##############  scopes ##########

    public function scopeGetOffers($query){
        return $query->whereNull('title_ar');
    }
}
