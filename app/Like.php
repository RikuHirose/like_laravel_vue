<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Like extends Model
{



    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'likes';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'post_id',
        'user_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var  array
     */
    protected $hidden = [];

    protected $dates  = [
    ];

    protected $casts     = [
    ];


    // Relations
    public function post()
    {
        return $this->belongsTo(\App\Post::class, 'post_id', 'id');
    }



    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }




    // Utility Functions

}
