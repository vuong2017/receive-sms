<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneMessage extends Model
{
    protected $table = "phone_messages";

    protected $fillable = [
        'phone_id', 'message'
    ];

    public function phone()
    {
        return $this->belongsTo('App\Phone', 'phone_id');
    }
}
