@extends('layouts.dashboard-waiter')

@section('title')
    Buy Product | SientaResto
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
        >
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Buy Product</h2>
            <p class="dashboard-subtitle">
                Big result start from the small one
            </p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                    @forelse ($products as $product)
                    <div class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img
                                        src="{{ Storage::url($product->photo) }}"
                                        class="w-100"
                                        alt=""
                                    />
                                    </div>
                                    <div class="col-md-3">{{ $product->name }}</div>
                                    <div class="col-md-2">
                                        {{ $product->category->name }}
                                    </div>
                                    <div class="col-md-2">IDR {{ number_format($product->price) }}</div>
                                    <div class="col-md-2">{{ $product->stock }}</div>
                                    <div class="col-md-2 d-none d-md-block">
                                    <form action="{{ route('buy-product.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                                        @if ($product->stock == 'ADA')
                                            <button
                                                type="submit"
                                                class="btn btn-success px-4">
                                                Pesan
                                            </button>
                                        @else
                                            <button
                                            type="button"
                                            disabled
                                            class="btn disabled btn-danger px-4">
                                            Kosong
                                        </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-md-12 mt-5 d-flex justify-content-center">
                            <div class="alert alert-info">
                                Product Not found
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 d-flex justify-content-center">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection