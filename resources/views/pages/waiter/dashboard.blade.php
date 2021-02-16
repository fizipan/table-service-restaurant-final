@extends('layouts.dashboard-waiter')

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
                        <div class="dashboard-card-title">Cart</div>
                        <div class="dashboard-card-subtitle">{{ $carts }} Cart</div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Order</h5>
                    @forelse ($orderRecent as $recent)
                    <a
                        href="{{ route('orders.edit', $recent->id) }}"
                        class="card card-list d-block"
                        >
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-2">
                                #{{ $recent->code }}
                            </div>
                            <div class="col-md-3">{{ Str::limit($recent->custumer_name, 16) }}</div>
                            <div class="col-md-3">{{ $recent->amount }} Menu</div>
                            <div class="col-md-3">{{ $recent->created_at->format('d, F Y') }}</div>
                            <div class="col-md-1 d-none d-md-block">
                                <img src="/images/icon-row.svg" alt="" />
                            </div>
                            </div>
                        </div>
                    </a>
                    @empty
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Order Not Found
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