<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\LoanOfficer;
use App\Models\LoanType;
use App\Models\Member;
use App\Models\PaidBill;
use App\Models\Saving;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transactions.index', compact(['transactions']));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $loan_officers = LoanOfficer::all();
        $groups = Group::all();
        $loan_types = LoanType::all();
        return view('admin.transactions.create', compact([
            'members',
            'loan_officers',
            'groups',
            'loan_types'
        ]));
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
            'photo' => 'required|mimes:jpeg,jpg,png,pdf,doc,docx|max:204800',
            'loan_type_id' => 'required',
            'member_id' => 'required',
            'loan_amount' => 'required',

        ]);

        if (Transaction::where('member_id', $request->member_id)->where('is_closed', 0)->count() > 0){
            return redirect()->route('transactions.index')->with('message', 'Sorry the selected member has active loan!');
        }

        date_default_timezone_set("Asia/Manila");

        $computes = $this->compute($request->loan_amount);

        $member_id = $request->member_id;
        $loan_type_id = $request->loan_type_id;
        $member_data = Member::find($member_id);
        $member_id = $member_data->id;
        $loan_officer_id = $member_data->groups->loan_officer_id;

        $photo = $request->photo->hashName();
        $request->photo->move(storage_path('app/public/transactions'), $photo);

        $cycle = Transaction::where('member_id', $member_id);
        if ($cycle->count() > 0){
            $cycle = $cycle->count() + 1;
        }else{
            $cycle = 1;
        }

        $transaction = new Transaction();

        $transaction->member_id = $member_id;
        $transaction->loan_amount = $computes['loan_amount'];
        $transaction->loan_amt_to_rcv = $computes['loan_amt_to_rcv'];
        $transaction->weekly_amortzn = $computes['weekly_amortzn'];
        $transaction->rsf = $computes['rsf'];
        $transaction->ac = $computes['ac'];
        $transaction->tag = "loan";
        $transaction->loan_type_id = $loan_type_id;
        $transaction->or_number = $transaction->tag.date('YmdHis').$member_id;
        $transaction->loan_officer_id = $loan_officer_id;
        $transaction->reference =  date('YmdHis').$member_id;
        $transaction->cycle_no = $cycle;
        $transaction->photo = $photo;
        $transaction->save();

        Saving::create([
                'transaction_id' => $transaction->id,
                'member_id' => $member_id,
                'cycle_no' => $transaction->cycle_no,
                'amount' => $computes['savings']
            ]
        );

        return redirect()->route('transactions.index')->with('message', 'Loan Created Successfully!');



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
        $transaction = Transaction::find($id);
        $members = Member::all();
        $loan_officers = LoanOfficer::all();
        $groups = Group::all();
        $loan_types = LoanType::all();
        return view('admin.transactions.edit', compact([
            'members',
            'loan_officers',
            'groups',
            'loan_types',
            'transaction'
        ]));
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
            'loan_type_id' => 'required',
            'member_id' => 'required',
            'loan_amount' => 'required',
        ]);



        $computes = $this->compute($request->loan_amount);

        $member_id = $request->member_id;
        $loan_type_id = $request->loan_type_id;
        $member_data = Member::find($member_id);
        $member_id = $member_data->id;
        $loan_officer_id = $member_data->loan_officer_id;
        if ($request->photo){
            $photo = $request->photo->hashName();
            $request->photo->move(storage_path('app/public/transactions'), $photo);
        }else{
            $photo = $request->old_photo;
        }


        $transaction = Transaction::find($id);

        $transaction->loan_amount = $computes['loan_amount'];
        $transaction->loan_amt_to_rcv = $computes['loan_amt_to_rcv'];
        $transaction->weekly_amortzn = $computes['weekly_amortzn'];
        $transaction->savings = $computes['savings'];
        $transaction->membership = $computes['membership'];
        $transaction->rsf = $computes['rsf'];
        $transaction->ac = $computes['ac'];
        $transaction->loan_type_id = $loan_type_id;
        $transaction->member_id = $member_id;
        $transaction->loan_officer_id = $loan_officer_id;
        $transaction->photo = $photo;

        $transaction->save();

        return redirect()->route('transactions.index')->with('message', 'Loan Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('message', 'Loan Deleted Successfully!');
    }
}


//$attachment = $request->attachment->hashName();
//$request->attachment->move(storage_path('app/public/wallet_attachments'), $attachment);
//
//$walattach = [
//    'wallet_transaction_id' => $wallet_transaction->id,
//    'attachment' => $attachment,
//];

//'attachment' => 'required|file|mimes:jpeg,jpg,png,pdf,doc,docx|max:204800',

//
//"loan_amount")->def
//("loan_amt_to_rcv")
//("weekly_amortzn")-
//("savings")->defaul
//("membership")->def
//("rsf")->default(0)
//("ac")->default(0);
//("is_loan")->defaul
//("is_saving")->defa
//("loan_type_id")->d
//("member_id")->defa
//("loan_officer_id")
