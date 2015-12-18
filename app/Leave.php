<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $guarded = ['id'];

    public function scopeApproved($query)
    {
        return $query->where('approved',1);
    }
    public function scopeRequests($query)
    {
        return $query->where('approved',0);
    }


    public function teammate()
    {
        return $this->belongsTo(Teammate::class);
    }
}
