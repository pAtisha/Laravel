<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //protected $fillable = ['title','content','slug','status','user_id'];
    protected $guarded = ['id']; // sada ce se samo ovaj id stititi
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function comments()
    {
        return $this->morphMany('App\Comment','post');
    }
}
