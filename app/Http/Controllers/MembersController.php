<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LoanOfficer;
use App\Models\PaidBill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Member;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();

        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        $loan_officers = LoanOfficer::all();
        return view('admin.members.create', compact(['groups', 'loan_officers']));
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
           'birthday' => 'required',
           'gender' => 'required',
           'civil_status' => 'required',
           'contact_number' => 'required',
           'co_maker_name' => 'required',
           'co_maker_address' => 'required',
           'co_maker_contact_number' => 'required',
           'co_maker_rel_to_mem' => 'required',
           'guarantor_name' => 'required',
           'guarantor_address' => 'required',
           'guarantor_contact_number' => 'required',
           'guarantor_rel_to_mem' => 'required',
           'group_id' => 'required'
        ]);

        $age = Carbon::parse($request->birthday)->diff(Carbon::now())->format('%y');
        $data = array_merge($request->all(),
            ['age' => $age]
        );



        $member = Member::create($data);

        $data = [
            'ornumber' => Carbon::now()->format('YmdHisa').$member->id,
            'member_id' => $member->id,
            'amount' => 100,
            'tag' => 'membership'
        ];

        PaidBill::create($data);

        return redirect()->route('members.index')->with('message', 'Member Created Successfully!');


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
        $member = Member::find($id);
        $groups = Group::all();
        $loan_officers = LoanOfficer::all();
        return view('admin.members.edit', compact(['member', 'groups', 'loan_officers']));
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
            'age' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'contact_number' => 'required',
            'co_maker_name' => 'required',
            'co_maker_address' => 'required',
            'co_maker_contact_number' => 'required',
            'co_maker_rel_to_mem' => 'required',
            'guarantor_name' => 'required',
            'guarantor_address' => 'required',
            'guarantor_contact_number' => 'required',
            'guarantor_rel_to_mem' => 'required',
            'group_id' => 'required',
            'loan_officer_id' => 'required'
        ]);
        $member = Member::find($id);
        $member->update($request->all());

        return redirect()->route('members.index')->with('message', 'Member Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index')->with('message', 'Member Deleted Successfully!');

    }
}
