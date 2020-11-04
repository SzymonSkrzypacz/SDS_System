<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

// Comment class instance will refer to comment table in database
class Comment extends Model
{
  //comments table in database
  protected $guarded = [];
  // user who has commented

  public function author()
  {
    return $this->belongsTo('App\User', 'author_id');
  }

  // returns post of any comment
  public function post()
  {
    return $this->belongsTo('App\Post', 'post_id');
  }
}
