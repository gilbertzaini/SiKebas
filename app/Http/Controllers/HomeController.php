<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\PenjualanSampah;
use App\Models\Saldo;
use App\Models\SetoranNasabah;
use App\Models\TabunganNasabah;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        return view('admin.index');
    }

    public function dashboard(){        
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        $pengurus = User::all();

        $nasabah = Nasabah::all();

        $transaction = PenjualanSampah::all()->count();
        // $transaction += SetoranNasabah::all()->count();
        $transaction += TabunganNasabah::all()->count();
        
        $saldo = 0;
        
        foreach ($nasabah as $item) {
            $saldo += $item->saldo;
        }

        return view('admin.dashboard', ['pengurus'=>$pengurus, 'nasabah'=>$nasabah, 'transaction'=>$transaction, 'saldo'=>$saldo]);
    }
}
