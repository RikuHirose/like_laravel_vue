<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';

  protected $fillable = ['user_id', 'content'];

  public function likes()
  {
      return $this->hasMany('App\Like');
  }

}
