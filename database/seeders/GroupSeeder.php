<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\LoanOfficer;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loan_officer = LoanOfficer::inRandomOrder()->first();

        Group::create([
            'group_name' => 'ProtoType',
            'leader' => 'Jhun',
            'meeting' => 'wednesday',
            'address' => 'Cagayan Valley',
            'contact_number' => '09361246825',
            'loan_officer_id' => $loan_officer->id,
        ]);

    }
}
