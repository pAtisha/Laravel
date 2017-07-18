<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];
    public function ticket()
    {
        return $this->belongsTo('App\Ticket'); // pripada Ticket modelu
    }

    public function post()
    {
        return $this->morphTo();
    }
}
