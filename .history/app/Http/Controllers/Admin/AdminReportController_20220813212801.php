<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoneOrder;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function view()
    {
        DB::enableQueryLog();
        $date = DoneOrder::whereBetween('created_at',['2022-08-13','2022-08-13'])->dd();
        // dd(DB::get)
        // dd($date);
        // $dateNow = new Date;
        // dd(DoneOrder::w->format('m/d/Y'));
        // dd(DoneOrder::all()[0]->created_at->format('d/m/Y'));
    }
}
