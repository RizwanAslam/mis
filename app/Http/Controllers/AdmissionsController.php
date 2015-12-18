<?php

namespace App\Http\Controllers;

use App\Admission;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
class AdmissionsController extends Controller
{
    //

    public function create()
    {
       return view('admissions.apply');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'course' => 'required',
            'fullName' => 'required',
            'email' => 'required|unique:admissions',
            'phone' => 'required',
            'degree' => 'required',
            'experience' => 'required',
        ],[
            'email.unique'=>'You have already applied for this course.'
        ]);
        Admission::create($request->all());

        //send email
        Mail::send('emails.admission', ['request' => $request], function ($message) use ($request) {
            $message->to($request->email, $request->fullName)->subject('Laravel Framework Training');
            $message->bcc('fakhar@softpyramid.com', 'Fakhar Khan');
        });

        return redirect()->back()->with('status', 'Your admission form has been submitted!');
    }

}
