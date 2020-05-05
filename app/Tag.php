<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Tag extends Model
{

    protected $fillable = [
         'name', 'slug', 
    ];


    public function posts(){
        return $this->belongsToMany(Post::class);
    }


}
