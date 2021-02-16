<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Waiter\OrderRequest;
use App\Models\Order;
use App\Models\Table;
use App\Models\Transaction;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
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
            $query = Order::with(['table']);

            return Datatables::of($query)
            ->addColumn('action', function($item){
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle mr-1 mb-1" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="'. route('orders.edit', $item->id) .'">
                                    Detail
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

        return view('pages.waiter.orders.index');
    }

    public function cetak()
    {
        $orders = Order::with('table')->get();
 
    	$pdf = \PDF::loadview('pages.waiter.orders.pdf',['orders'=>$orders]);
    	return $pdf->download('laporan-order-pdf.pdf');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::with('table')->where('id', $id)->firstOrFail();
        $tables = Table::all();
        return view('pages.waiter.orders.edit', [
            'order' => $order,
            'tables' => $tables,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $data = $request->except('amount');

        $order = Order::findOrFail($id);
        $order->update($data);

        session()->flash('success', 'updated');

        return redirect()->route('orders.index');
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
