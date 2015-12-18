<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    protected $primaryKey = 'jobId';
    protected $guarded = [];

    public function scopeMy($query)
    {
        $permissions = Permission::where('user_id',auth()->user()->id)
                        ->where('model_name',Project::class)
                        ->lists('model_id');
        return $query->whereIn('jobid',$permissions);
    }

    public function getTeamAttribute()
    {
        $permissions = Permission::where('model_name','App\Project')->where('model_id',$this->jobId)->get();
        $team=[];
        foreach($permissions as $permission){
            array_push($team,$permission->user->teammate->full_name);
        }
        return $team;
    }

}
