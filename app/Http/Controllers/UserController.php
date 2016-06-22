<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //

    public function me(Request $request)
    {
        $teammate = auth()->user()->teammate;
        if($request->getMethod()=='POST')
        {
            $teammate->update($request->all());
            return redirect()->back()->with('status', 'Profile update!');
        }
        return view('users.me',compact('teammate'));
    }

    public  function  leaveApplication(Request $request)
    {
        $teammate = auth()->user()->teammate;

        if($request->getMethod()=='POST')
        {
            $this->validate($request, [
                'start_date' => 'required',
                'leave_hours' => 'required',
            ],[
                'start_date.required' => 'The Date field is required.',
                'leave_hours.required' => 'The Leave Type field is required.',
            ]);

            $balance=($teammate->earned-$teammate->availed)-1;
            if($balance<0)
            {
                return redirect()->back()->with('error','Sorry, You have already availed your earned leaves!');
            }

            $leave = $teammate->leaves()->save(new Leave($request->all()));

            Mail::send('emails.leave-request', ['leave' => $leave], function ($m) use ($leave) {
                $m->to('rizwan@codebrisk.com', "HR")->subject('Leave has been applied');
            });

            return redirect()->route('home')->with('status', 'Leave Application has been submitted!');
        }

        $leave = new Leave();
        $leave->start_date=Carbon::now();
        $leave->end_date=Carbon::now();
        $leave->leave_hours=8;
        return view('leaves.application',compact('teammate','leave'));
    }


}
