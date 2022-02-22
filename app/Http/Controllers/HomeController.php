<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total = Certificate::select(DB::raw("CAST(COUNT(id) as int) as jumlah"))
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('jumlah');

        $bulan = Certificate::select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->GroupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('bulan');
        // dd($total);

        return view('dashboard', compact('total', 'bulan'));
    }
}
