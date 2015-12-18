<?php

namespace App\Policies;

use App\Permission;
use App\Project;

class ProjectsPolicy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function timesheets($user,Project $project)
    {
        return Permission::where('user_id',$user->id)
            ->where('model_name','App\Project')
            ->where('model_id',$project->jobId)
            ->first();
    }

}
