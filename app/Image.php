<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function users(){
        return $this->belongsToMany(User::class, 'user_images', 'image_id', 'id');
    }
}
