<?php

namespace App\Http\Controllers\Owner;

use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionsDetail;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $transaction = Transaction::count();
        $order = Order::count();
        return view('pages.onwer.dashboard', [
            'user' => $user,
            'transaction' => $transaction,
            'order' => $order,
        ]);
    }

    public function cetak_orders()
    {
        $orders = Order::with('table')->get();
 
    	$pdf = \PDF::loadview('pages.onwer.pdf.orders-pdf',['orders'=>$orders]);
    	return $pdf->download('laporan-order-pdf.pdf');
    }

    public function cetak_transactions()
    {
        $transaction = TransactionsDetail::with('transaction.order', 'product')->get();
 
    	$pdf = \PDF::loadview('pages.onwer.pdf.transactions-pdf',['transaction'=>$transaction]);
    	return $pdf->download('laporan-transaction-pdf.pdf');
    }

    public function cetak_users()
    {
        $users = User::with('role')->get();
 
    	$pdf = \PDF::loadview('pages.onwer.pdf.users-pdf',['users'=>$users]);
    	return $pdf->download('laporan-users-pdf.pdf');
    }
}
