<?php

namespace App\Http\Controllers;

use App\Models\LoanOfficer;
use App\Models\Position;
use Illuminate\Http\Request;

class LoanOfficersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan_officers = LoanOfficer::all();
        return view('admin.loan_officers.index', compact('loan_officers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        return view('admin.loan_officers.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'position_id' => 'required',
            'contact_number' => 'required',
            'date_hired' => 'required',
        ]);

        LoanOfficer::create($request->all());
        return redirect()->route('loan_officers.index')->with('message', 'Loan Officer Created Successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan_officer = LoanOfficer::find($id);
        $positions = Position::all();
        return view('admin.loan_officers.edit', compact(['loan_officer', 'positions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'position_id' => 'required',
            'contact_number' => 'required',
            'date_hired' => 'required',
        ]);


        $loan_officer = LoanOfficer::find($id);
        $loan_officer->update($request->all());
        return redirect()->route('loan_officers.index')->with('message', 'Loan Officer Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan_officer = LoanOfficer::find($id);

        $loan_officer->delete();
        return redirect()->route('loan_officers.index')->with('message', 'Loan Officer Deleted Successfully!');
    }
}
