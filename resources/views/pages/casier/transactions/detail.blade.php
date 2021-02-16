@extends('layouts.dashboard-casier')

@section('title')
    Transaction Detail | SientaResto
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
        id="appCart"
        >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">#{{ $transaction->transaction->order->code }}</h2>
                <p class="dashboard-subtitle">
                    Transactions Pay
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12 mt-2">
                        <section class="data-user mt-2" id="data-user">
                            <div class="container">
                                <div class="row justify-content-center mt-4">
                                    <div class="col-md-6">
                                        <div class="card input-meja mb-4" id="appCart">
                                            <div class="card-header">
                                                <h5>Tambah Transaksi</h5>
                                            </div>
                                            <form action="{{ route('transactions.update', $transaction->transaction->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                <h5 class="font-weight-bold mb-2">Tagihan Anda 
                                                    <span class="text-success">
                                                        IDR {{ number_format($transaction->transaction->total_price) }}
                                                    </span>
                                                    </h5>
                                                <div class="form-group">
                                                    <label for="pay_bills"
                                                    >Uang Anda</label
                                                    >
                                                    <input type="number" v-model="pay" class="form-control" name="pay_bills" id="pay_bills">
                                                    <span v-if="money_change < 0" class="text-danger">
                                                        Uang anda Kurang
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="money_change"
                                                    >Kembalian Anda</label
                                                    >
                                                    <input type="number" readonly :value="money_change < 0 ? 0 : money_change" class="form-control" name="money_change" id="money_change">
                                                </div>
                                                <button type="submit" :disabled="money_change < 0"  class="btn btn-success">Bayar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#appCart',
            data: {
                pay: '',
            },
            computed: {
                money_change: function(){
                    return this.pay - ({{ $transaction->transaction->total_price }})
                }
            },
            // methods: {
            //     disableMethod: function(){
            //         this.money_change() 
            //     }
            // }
        });
    </script>
@endpush
