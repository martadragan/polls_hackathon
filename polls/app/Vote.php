<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user () 
    {
        return $this->belongsTo('\App\User');
    }

    public function poll () 
    {
        return $this->belongsTo('\App\Poll');
    }

    public function option () 
    {
        return $this->belongsTo('\App\Option');
    }
}
