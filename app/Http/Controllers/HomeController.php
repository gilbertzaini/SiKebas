<?php

namespace App\Http\Controllers;

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

    public function transactions(){
        $transactions = Transaction::all();
        return view('admin.daftarTransaksi', ['transactions'=>$transactions]);
    }

    public function dashboard(){        
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        $pengurus = User::where('is_admin', 1)
                    // ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                    ->get();

        $nasabah = User::where('is_admin', 0)
                    // ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                    ->get();

        $transaction = PenjualanSampah::all()->count();
        $transaction += SetoranNasabah::all()->count();
        $transaction += TabunganNasabah::all()->count();
        
        $saldos = Saldo::all();
        $saldo = 0;
        
        foreach ($saldos as $item) {
            $saldo += $item->saldo;
        }

        return view('admin.dashboard', ['pengurus'=>$pengurus, 'nasabah'=>$nasabah, 'transaction'=>$transaction, 'saldo'=>$saldo]);
    }
}
