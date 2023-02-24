<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function members(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function loan_officers(){
        return $this->hasOne(LoanOfficer::class, 'id', 'loan_officer_id');
    }

    public function groups(){
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

    public function activeLoan(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }


}
