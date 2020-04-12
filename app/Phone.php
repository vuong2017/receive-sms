<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phones";
    protected $fillable = [
        'textnow_id', 'phone_country_id', 'phone_number', 'message'
    ];

    public function textNow()
    {
        return $this->belongsTo('App\TextNow');
    }

    public function phoneMessage() {
        return $this->hasMany('App\PhoneMessage');
    }
}
