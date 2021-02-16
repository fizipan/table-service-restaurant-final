<?php

namespace App\Http\Controllers\Casier;

use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Models\TransactionsDetail;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) 
        {
            $query = Transaction::with('order.table')->where('status', 'BELUM BAYAR');
            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle mr-1 mb-1" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="'. route('transactions.show', $item->id) .'">
                                    Bayar
                                </a>
                            </div>
                        </div>
                    </div>
                ';
            })
            ->addColumn('date', function($item){
                return $item->created_at->format('d, F Y');
            })
            ->rawColumns(['action', 'date'])
            ->make();
            
        }
        return view('pages.casier.transactions.index');
    }

    public function cetak()
    {
        $transaction = TransactionsDetail::with('transaction.order', 'product')->get();
 
    	$pdf = \PDF::loadview('pages.casier.transactions.pdf',['transaction'=>$transaction]);
    	return $pdf->download('laporan-transaction-pdf.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transactionsDetail = TransactionsDetail::with('transaction.order', 'product.category')->where('transactions_id', $id)->get();
        $transaction = TransactionsDetail::with('transaction.order', 'product.category')->where('transactions_id', $id)->firstOrFail();
        return view('pages.casier.transactions.detail', [
            'transactionsDetail' => $transactionsDetail,
            'transaction' => $transaction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transactionDetail = TransactionsDetail::where('transactions_id',$id)->get();

        Transaction::where('id', $id)->update([
            'status' => 'LUNAS',
        ]);
        
        foreach ($transactionDetail as $t) {
            TransactionsDetail::where('transactions_id',$id)->update([
                'pay_bills' => $request->pay_bills,
                'money_change' => $request->money_change,
            ]);
        }

        session()->flash('success', 'Transaction Clear');
        return redirect()->route('transactions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
