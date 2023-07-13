<?php

namespace App\Http\Controllers;

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
                    ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                    ->get();

        $nasabah = User::where('is_admin', 0)
                    ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                    ->get();

        $transaction = Transaction::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->get();
        
        $saldo = 0;
        
        foreach ($transaction as $transaction) {
            $saldo += $transaction->total;
        }

        return view('admin.dashboard', ['pengurus'=>$pengurus, 'nasabah'=>$nasabah, 'transaction'=>$transaction, 'saldo'=>$saldo]);
    }
}
