<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanOfficer extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function positions(){
        return $this->hasOne(Position::class, 'id', 'position_id');
    }

    public function groups(){
        return $this->hasMany(Group::class, 'loan_officer_id', 'id');
    }

    public function getFullNameAttribute(){
        return ucwords($this->firstname." ".$this->middlename." ".$this->lastname);
    }
}
