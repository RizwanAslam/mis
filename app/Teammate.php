<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teammate extends Model
{
    protected $guarded = ['id','elance_user_id'];

    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
    public function increments()
    {
        return $this->hasMany(Increment::class);
    }

    public function getAvailedAttribute()
    {
        return $this->leaves->sum('leave_hours')/8;
    }
    public function getEarnedAttribute()
    {
        return employment_months($this->date_of_joining) * (round($this->no_of_leaves/12,2)) ;
    }
}
