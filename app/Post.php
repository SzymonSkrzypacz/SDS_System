<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'author_id'
    ];

    public function comments()
    {
      return $this->hasMany('App\Comment', 'post_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
