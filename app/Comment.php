<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Comment extends Model
{
    protected $fillable = [
        'body', 'user_id', 'post_id', 
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
