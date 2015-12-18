<?php

namespace App\Http\Controllers;

use App\Teammate;
use App\Increment;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IncrementsController extends Controller
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
        return view('increments.index',compact('teammate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($teammate)
    {
        $teammate=Teammate::find($teammate);
        $increment = new Increment();
        $increment->increment_date=Carbon::now();
        $increment->amount=0.00;

        return view('increments.create',compact('teammate','increment'));
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
        $teammate->increments()->save(new Increment($request->all()));
        return redirect()->route('teammates.{teammate}.increments.index', [$teammate->id])->with('status', 'Increment created!');
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
        //
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
        //
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
