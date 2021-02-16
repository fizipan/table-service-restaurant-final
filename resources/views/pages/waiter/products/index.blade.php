@extends('layouts.dashboard-waiter')

@section('title')
    Products | SientaResto
@endsection 

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">All Menu</h2>
                <p class="dashboard-subtitle">Manage it well and get money</p>
                <a
                    href="{{ route('products.create') }}"
                    class="btn btn-success"
                >
                    Add New Menu
                </a>
            </div>
            <div class="dashboard-content">
                <div class="row mt-4">
                    @forelse ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a
                            href="{{ route('products.edit', $product->id) }}"
                            class="card card-list-product"
                        >
                            <div class="card-body">
                                <img src="{{ Storage::url($product->photo) }}" style="max-height: 160px" alt="" class="w-100" />
                            <div class="dashboard-product-title">
                                {{ $product->name }}
                            </div>
                            <div class="dashboard-product-subtitle">{{ $product->category->name }}</div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="col-12 d-flex mt-5 justify-content-center">
                        <div class="alert alert-info">
                            Product not found
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection