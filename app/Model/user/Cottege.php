<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Cottege extends Model
{
    public function images()
    {
        return $this->hasMany('App\Model\user\Image');
    }

    public function availableImages() {
        return $this->images()->where('deleted','!=', 1);
    }
}
