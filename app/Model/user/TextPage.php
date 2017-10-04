<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class TextPage extends Model
{
    public function images()
    {
        return $this->hasMany('App\Model\user\Image', 'page_id');
    }

    public function availableImages() {
        return $this->images()->where('deleted','!=', 1);
    }
}
