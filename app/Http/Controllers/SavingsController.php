<?php

namespace App\Http\Controllers;


use App\Models\Member;
use App\Models\Saving;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('admin.savings.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.savings.create');
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
            'amount' => 'required|integer'
        ]);
        $member_id = $request->member_id;
        $member_transaction = Transaction::where('member_id', $member_id)
            ->where('is_closed', 0)->get()->first();

        $cycle_no = $member_transaction->cycle_no;
        $transaction_id = $member_transaction->id;

        $data = [
            'transaction_id' => $transaction_id,
            'member_id' => $member_id,
            'cycle_no' => $cycle_no,
            'amount' => $request->amount
        ];

        Saving::create($data);
        return redirect()->route('savings.index')->with('message', 'Savings Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('admin.savings.show', compact('member'));
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
        return view('admin.savings.edit', compact('member'));

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
        $saving = Saving::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saving = Saving::find($id);
        $saving->delete();
        return view('admin.savings.index')->with('message', 'Saving Delete Successfully');
    }
}
