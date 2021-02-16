<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Waiter\CheckoutRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\TransactionsDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function process(CheckoutRequest $request)
    {
        $carts = Cart::with('product.category')->get();
        $cartAmount = Cart::count();
        $code = 'SRT' . mt_rand(00000,99999);

        $orders = Order::create([
                'tables_id' => $request->tables_id,
                'amount' => $cartAmount,
                'custumer_name' => $request->custumer_name,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'address' => $request->address,
                'code' => $code,
            ]);
        
        $transaction = Transaction::create([
            'orders_id' => $orders->id,
            'total_price' => $request->total_price,
        ]);

        foreach ($carts as $cart) {

            TransactionsDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'pay_bills' => 0,
                'money_change' => 0,
            ]);
        }

        Cart::with('product.category')->delete();
        session()->flash('success', 'Pesanan Berhasil Ditambahkan');
        return redirect()->route('orders.index');
    }
}
