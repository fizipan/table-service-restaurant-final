@extends('layouts.dashboard-casier')

@section('title')
    Dashboard | SientaResto
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
        >
            <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">Menu</div>
                        <div class="dashboard-card-subtitle">{{ $products }} Menu</div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">Order</div>
                        <div class="dashboard-card-subtitle">{{ $orders }} Order</div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">Transactions</div>
                        <div class="dashboard-card-subtitle">{{ $transactions }} Transactions</div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transactions</h5>
                    @forelse ($transactionRecent as $recent)
                    <div
                        class="card card-list d-block"
                        >
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-2">
                                #{{ $recent->order->code }}
                            </div>
                            <div class="col-md-3">IDR. {{ number_format($recent->total_price) }}</div>
                            <div class="col-md-3">{{ $recent->status }}</div>
                            <div class="col-md-3">{{ $recent->created_at->format('d, F Y') }}</div>
                            <div class="col-md-1 d-none d-md-block">
                                <img src="/images/icon-row.svg" alt="" />
                            </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Transaction Not Found
                                </div>
                            </div>
                        </div>
                    @endforelse
                    
                </div>
                </div>
            </div>
            </div>
        </div>
@endsection
