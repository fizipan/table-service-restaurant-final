@extends('layouts.dashboard-admin')

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
                        <div class="dashboard-card-subtitle">{{ $menu }} Menu</div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">Table</div>
                        <div class="dashboard-card-subtitle">{{ $meja }} Table</div>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                    <div class="card-body">
                        <div class="dashboard-card-title">user</div>
                        <div class="dashboard-card-subtitle">{{ $user }} User</div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Products</h5>
                    @forelse ($menuRecent as $recent)
                    <a
                        href="{{ route('product.edit', $recent->id) }}"
                        class="card card-list d-block"
                        >
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-1">
                                <img
                                src="{{ Storage::url($recent->photo) }}"
                                class="w-100"
                                alt=""
                                />
                            </div>
                            <div class="col-md-3">{{ $recent->name }}</div>
                            <div class="col-md-3">{{ $recent->category->name }}</div>
                            <div class="col-md-2">IDR {{ number_format($recent->price) }}</div>
                            <div class="col-md-3">{{ $recent->created_at->format('d, F Y') }}</div>
                            </div>
                        </div>
                    </a>
                    @empty
                        
                    @endforelse
                    
                </div>
                </div>
            </div>
            </div>
        </div>
@endsection