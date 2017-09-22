<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $guarded = [];

    public function setIssuedDateAttribute($value) {
        $this->attributes['issued_date'] = Carbon::parse($value);
    }

    public function getIssuedDateAttribute($key)
    {
        return Carbon::parse($key)->format('M y');
    }

    public function totalSalary(){
        $b = !is_null($this->basic_pay)?$this->basic_pay:0;
        $i = !is_null($this->increment_amount)?$this->increment_amount:0;
        $hr = !is_null($this->hourly_rate)?$this->hourly_rate:0;
        $hm = !is_null($this->hourly_amount)?$this->hourly_amount:0;
        $bm = !is_null($this->bonus_amount)?$this->bonus_amount:0;

        return $b+$i+$hr+$hm+$bm;
    }
}
