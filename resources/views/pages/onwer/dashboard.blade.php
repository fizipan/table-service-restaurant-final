@extends('layouts.dashboard-onwer')

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
                        <div class="dashboard-card-title">Orders</div>
                        <div class="dashboard-card-subtitle">{{ $order }} Orders</div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">Transactions</div>
                        <div class="dashboard-card-subtitle">{{ $transaction }} Transactions</div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">Users</div>
                        <div class="dashboard-card-subtitle">{{ $user }} Users</div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Print Report</h5>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('print-orders') }}" class="btn btn-danger btn-block">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                            </svg>
                            Print Orders
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('print-transactions') }}" class="btn btn-warning btn-block">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                            </svg>
                            Print Transactions
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('print-users') }}" class="btn btn-success btn-block">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                            </svg>
                            Print Users
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection