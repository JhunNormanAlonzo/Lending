<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function groups(){
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

    public function loan_officers(){
        return $this->hasOne(LoanOfficer::class, 'id', 'loan_officer_id');
    }


    public function getFullNameAttribute(){
        return ucwords($this->firstname." ".$this->middlename." ".$this->lastname);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'member_id', 'id')->where('is_closed', 0);
    }


}
