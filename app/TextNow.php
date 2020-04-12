<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextNow extends Model
{

    protected $table = 'text_nows';
    protected $fillable = [
        'login_by', 'cookie', 'user_name_textnow', 'create_by'
    ];

    public function phones()
    {
        return $this->hasMany('App\Phone', 'textnow_id');
    }

}
