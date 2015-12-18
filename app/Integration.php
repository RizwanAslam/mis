<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    //Elance Integration
    public function scopeElance($query)
    {
        return $query->where('server','Elance');
    }

}
