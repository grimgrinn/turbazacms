<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Turbaza extends Model
{
    public function pages()
    {
        return $this->hasMany('App\Model\user\TextPage');
    }

    public function cotteges()
    {
        return $this->hasMany('App\Model\user\Cottege');
    }

    public function images()
    {
        return $this->hasMany('App\Model\user\Image');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
