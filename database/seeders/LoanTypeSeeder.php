<?php

namespace Database\Seeders;

use App\Models\LoanType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanType::create([
            'loan_name' => 'Regular Loan'
        ]);

        LoanType::create([
            'loan_name' => 'Individual Business Loan'
        ]);

        LoanType::create([
            'loan_name' => 'Emergency Loan'
        ]);
    }
}

//Regular Loan
//Individual business Loan
//Emergency Loan
