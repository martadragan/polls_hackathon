<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'polls';
    protected $fillable = [
        'title',
        'text',
        'user_id'
    ];

    public function user () 
    {
        return $this->belongsTo('\App\User');
    }

    public function options () 
    {
        return $this->hasMany('\App\Option');
    }

    public function votes () 
    {
        return $this-hasMany('\App\Vote');
    }
}
