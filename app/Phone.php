<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phones";
    protected $fillable = [
        'textnow_id', 'phone_country_id', 'phone_number'
    ];

    public function text_nows()
    {
        return $this->belongsTo('App\TextNow', 'textnow_id');
    }
}
