<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportDateRequest;
use App\Models\DoneOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class AdminReportController extends Controller
{
    private $DateTimeBefore ,$DateTimeAfter;

    public function view()
    {
        // DB::enableQueryLog();
        // $date = DoneOrder::whereDate('created_at',['2022-08-10  ','2022-08-12'])->dd();
        // $test = DB::table('done_orders')
        // ->select('*')
        // ->whereBetween('created_at', ['2022-08-05 00:00:00', '2022-08-10 23:59:59'])
        // ->get();

        // $result = DoneOrder::whereBetween('created_at', ['2022-08-05 00:00:00', '2022-08-10 23:59:59'])->get();
        // dd($result);

        // dd(DB::get)
        // dd($date);
        // $dateNow = new Date;
        // dd(DoneOrder::w->format('m/d/Y'));
        // dd(DoneOrder::all()[0]->created_at->format('d/m/Y'));
        return view('admin.reports.report');
    }
    public function getReport(ReportDateRequest $request)
    {

        $this->DateTimeBefore = $request->date_time_before;
        $this->DateTimeAfter = $request->date_time_after;
        $DateTimeBeforeFormat = Carbon::parse($this->DateTimeBefore)->format('Y-m-d H:h:s');;
        $DateTimeAfterFormat = Carbon::parse($this->DateTimeAfter)->format('Y-m-d H:h:s');;
        $reports = DoneOrder::whereBetween('created_at', [$this->DateTimeBefore, $this->DateTimeAfter])->get();
        return view('admin.reports.report', compact('reports', 'DateTimeBeforeFormat', 'DateTimeAfterFormat'));
    }
    public function print_report()
    {
        $DateTimeBefore = $this->DateTimeBefore;
        $DateTimeAfter = $this->DateTimeAfter;
        $DateTimeBeforeFormat = Carbon::parse($DateTimeBefore)->format('Y-m-d H:h:s');;
        $DateTimeAfterFormat = Carbon::parse($DateTimeAfter)->format('Y-m-d H:h:s');;
        DB::enableQueryLog();

        $reports = DoneOrder::whereBetween('created_at', [$DateTimeBefore, $DateTimeAfter])->get();

        dd(DB::getQueryLog());
        PDF::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('admin.print.report',  compact('reports', 'DateTimeBeforeFormat', 'DateTimeAfterFormat'));
        return $pdf->stream('bill.pdf');
    }
}
