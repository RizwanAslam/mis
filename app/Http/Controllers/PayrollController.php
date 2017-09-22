<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Teammate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PayrollController extends Controller
{
    public function __construct(Teammate $teammate)
    {
        $this->authorize($teammate);
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
        return view('payroll.edit',compact('teammate'));
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
        return redirect('teammates')->with('status', 'Payroll updated!');
    }


}
