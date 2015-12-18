<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Permission extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function resource()
    {
        $model= App::make($this->first()->model_name);
        return $this->hasOne($this->first()->model_name,$model->getKeyName(),'model_id');

    }

    public function resources()
    {
            $model= App::make($this->first()->model_name);
            return $this->hasMany($this->first()->model_name,$model->getKeyName(),'model_id');
    }

}
