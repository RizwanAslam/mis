<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Teammate;
use Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LeavesController extends Controller
{


    public function __construct(Teammate $teammate)
    {
        $this->authorize($teammate);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($teammate)
    {
        $teammate=Teammate::find($teammate);
        $teammate->employment_months = employment_months($teammate->date_of_joining);
        $types = leave_types();
        return view('leaves.index',compact('teammate','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($teammate)
    {
        $teammate=Teammate::find($teammate);
        $leave = new Leave();
        $leave->start_date=Carbon::now();
        $leave->end_date=Carbon::now();
        $leave->leave_hours=8;
        $leave->types=leave_types();
        return view('leaves.create',compact('teammate','leave'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request,$teammate)
    {
        $teammate=Teammate::find($teammate);
        $teammate->leaves()->save(new Leave($request->all()));
        return redirect()->route('teammates.{teammate}.leaves.index', [$teammate->id])->with('status', 'Leave created!');
    }

    //Only admin can access it
    public function approve($leave)
    {
        $leave= Leave::find($leave);

        $balance=($leave->teammate->earned-$leave->teammate->availed)-1;
        if($balance<0)
        {
            return redirect()->back()->with('error','Sorry, '.$leave->teammate->full_name.' has already availed his earned leaves!');
        }

        $leave->update(['approved'=>1]);

        //send email
        Mail::send('emails.leave-approved', ['leave' => $leave], function ($m) use ($leave) {
            $m->to($leave->teammate->email, $leave->teammate->name)->subject('Leave has been approved');
        });

        return redirect()->route('home')->with('status', 'Leave has been approved!');
    }


}
