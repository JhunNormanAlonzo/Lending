<?php

namespace Database\Seeders;

use App\Models\LoanOfficer;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanOfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = Position::inRandomOrder()->first();

        LoanOfficer::create([
            'firstname' => 'arnel',
            'middlename' => 'siriban',
            'lastname' => 'orata',
            'address' => 'cagayan',
            'gender' => 'male',
            'contact_number' => '09957548690',
            'position_id' => $position->id,
            'date_hired' => Carbon::now()->toDateTime(),
        ]);
    }
}
