<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function loan_officers(){
        return $this->belongsTo(LoanOfficer::class, 'loan_officer_id', 'id');
    }


}
