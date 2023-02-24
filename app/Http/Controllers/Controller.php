<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $loan_amount, $loan_amt_to_rcv, $wkly_amortzn, $savings, $membership_fee, $rsf, $ac;

    public function compute($loan_amount){
        $this->loan_amount = $loan_amount;
        $this->loan_amt_to_rcv = $loan_amount * 1.15;
        $this->wkly_amortzn = $this->loan_amt_to_rcv / 23;
        $this->savings = $loan_amount * 0.05;
        $this->membership_fee = 100;
        $this->rsf = $this->loan_amount / 1000;
        $this->rsf = $this->rsf * 10;
        $this->ac = $this->loan_amount / 1000;
        $this->ac = $this->ac * 5;

        return [
            'loan_amount' => $this->loan_amount,
            'loan_amt_to_rcv' => $this->loan_amt_to_rcv,
            'weekly_amortzn' => $this->wkly_amortzn,
            'savings' => $this->savings,
            'membership' => $this->membership_fee,
            'rsf' => $this->rsf,
            'ac' => $this->ac
        ];


    }
}
