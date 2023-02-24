<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function daily_over_due(){
        return view('admin.reports.daily_over_due');
    }
}
