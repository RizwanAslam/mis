<?php

namespace App\Http\Controllers;

use App\Teammate;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeammatesController extends Controller
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
    public function index(Teammate $teammate)
    {
        $teammates= $teammate->active()->get();

        return view('teammates.index',compact('teammates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $teammate=new Teammate();
        return view('teammates.create',compact('teammate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'date_of_joining'=>Carbon::now(),
            'designation' => 'Software Engineer',
            'no_of_leaves' => 20,
            'basic_pay' => '5000.00',
            'months_of_increment' => 6,
            'months_of_confirmation' => 3,
        ]);
        $teammate = Teammate::create($request->all());
        $user = [
            'name' => $request->full_name.' '.$request->father_name,
            'email'=> $request->email,
            'password' => bcrypt('123456'),
            'role' => 'developer',
            'teammate_id' => $teammate->id
        ];

        User::create($user);
        return redirect('teammates')->with('status', 'Teammate created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $teammate=Teammate::find($id);
        return view('teammates.edit',compact('teammate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Teammate::find($id)->update($request->all());
        return redirect('teammates')->with('status', 'Teammate updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
