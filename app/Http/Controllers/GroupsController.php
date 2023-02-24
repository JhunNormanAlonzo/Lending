<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\LoanOfficer;
use App\Models\Member;
use App\Models\PaidBill;
use App\Models\Saving;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groups = Group::all();
        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loan_officers = LoanOfficer::all();
        return view('admin.groups.create', compact('loan_officers'));
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
           'group_name' => 'required',
           'leader' => 'required',
           'meeting' => 'required',
           'address' => 'required',
           'contact_number' => 'required',
           'loan_officer_id' => 'required'
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index')->with('message', 'Group Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $members = Member::join('transactions', 'transactions.member_id', 'members.id')
            ->where('members.group_id', $id)
            ->where('transactions.is_closed', 0)
            ->latest('transactions.created_at')
            ->get([
                'members.*',
                'members.id as member_id',
                'transactions.id as transaction_id',
                'transactions.*'
//                'members.firstname',
//                'members.middlename',
//                'members.lastname',
//                'members.address',
//                'members.contact_number',
//                'members.co_maker_name',
//                'members.co_maker_contact_number',
//                'members.co_maker_address',
//                'members.co_maker_rel_to_mem',
//                'members.guarantor_name',
//                'members.guarantor_contact_number',
//                'members.guarantor_address',
//                'members.guarantor_rel_to_mem'
            ]);


        $group = Group::find($id);



        return view('admin.groups.show', compact('members', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan_officers = LoanOfficer::all();
        $group = Group::find($id);
        return view('admin.groups.edit', compact(['group', 'loan_officers']));

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
            'group_name' => 'required',
            'leader' => 'required',
            'meeting' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'loan_officer_id' => 'required'
        ]);

        $group = Group::find($id);
        $group->update($request->all());
        return redirect()->route('groups.index')->with('message', 'Group Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect()->route('groups.index')->with('message', 'Group Deleted Successfully!');
    }

    public function transaction($group){

    }

    public function payment(Request $request){
        if ($request->check){

            foreach ($request->check as $check){
                $transaction = Transaction::where('member_id', $check)->where('is_closed', 0)->first();


                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $rand = substr(str_shuffle(str_repeat($pool, 5)), 0, 10);

                $data = [
                    'transaction_id' => $transaction->id,
                    'ornumber' => $rand.$transaction->member_id,
                    'member_id' => $transaction->member_id,
                    'amount' => $transaction->weekly_amortzn - ($transaction->weekly_amortzn * 2),
                    'tag' => 'weekly'
                ];

                $paidbill = PaidBill::where('transaction_id', $transaction->id)
                    ->where('member_id', $transaction->member_id)
                    ->where('tag', 'weekly')
                    ->get();

                if ($paidbill->count() > 0){
                    $amount_to_pay = $transaction->loan_amt_to_rcv + $paidbill->sum('amount');
                }else{
                    $amount_to_pay = $transaction->loan_amt_to_rcv;
                }

                if ($amount_to_pay > 0){
                    PaidBill::create($data);
                    Saving::create([
                            'transaction_id' => $transaction->id,
                            'member_id' => $transaction->member_id,
                            'cycle_no' => $transaction->cycle_no,
                            'amount' => 100
                        ]
                    );
                }else{
                    $transaction->update(['is_closed' => 1]);
                }
            }
            return redirect()->back()->with('message', 'Payment generated successfully!');
        }else{
            return redirect()->back()->with('message', 'Please mark the checkbox atleast one!');
        }



    }


    public function send(Request $request){
        $this->validate($request, [
            'username' => 'required|email'
        ]);
    }

}
