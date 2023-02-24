<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Carbon\Carbon;
use Livewire\Component;

class DailyOverDue extends Component
{
    public $search;
    public $date_created;
    public $day;

    public function render()
    {
        if (empty($day)){
            $day = strtolower(Carbon::now()->format('l'));
        }else{
            $day = $this->day;
        }
        return view('livewire.daily-over-due', [
            'members' => Member::search('created_at', $this->date_created)
                ->search('firstname', $this->search)
                ->paginate(1)
        ]);
    }
}
