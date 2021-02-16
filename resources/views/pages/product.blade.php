@extends('layouts.app')

@section('title')
    All Product | SientaResto
@endsection

@section('content')
    <div class="page-content page-order">
        <section class="categories" id="categories">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>All Categories</h5>
                </div>
            </div>
            <div class="row justify-content-center">
                @php
                    $Iteration = 0;
                @endphp
                @forelse ($categories as $category)
                <div class="col-6 col-md-2" data-aos="fade-down" data-aos-delay="{{ $Iteration += 100 }}">
                    <a href="{{ route('category', $category->slug) }}" class="card card-category mb-3">
                        <div class="card-body">
                            <div class="icon-category">
                            <img src="{{ Storage::url($category->photo) }}" class="w-100" alt="" />
                            </div>
                            <div class="title-text">{{ $category->name }}</div>
                        </div>
                    </a>
                </div>
                @empty
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="alert alert-info">
                            Categories Not Found
                        </div>
                    </div>
                @endforelse
            </div>
        </section>

        <section class="favorite product mt-5" id="favorite">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    @isset($categoryFirst)
                        <h5>Category : {{ $categoryFirst->name }}</h5>
                    @else 
                        <h5>All Products</h5>
                    @endisset
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    @php
                        $Iteration = 0;
                    @endphp
                    @forelse ($products as $product)
                        <div
                        class="col-10 col-sm-6 col-md-3"
                        data-aos="fade-down"
                        data-aos-delay="{{ $Iteration += 100 }}"
                    >
                        <div class="product-food card">
                            <div class="card-body">
                                <div class="food-thumbnail">
                                <img
                                    src="{{ Storage::url($product->photo) }}"
                                    class="img-food w-100 rounded"
                                    alt=""
                                />
                                </div>
                                <div class="food-description mt-3">
                                    <div class="row justify-content-between">
                                        <div class="col-8">
                                        <div class="detail-food">
                                            <div class="title-food">{{ Str::limit($product->name, 16) }}</div>
                                            <div class="price-food">IDR {{ number_format($product->price) }}</div>
                                        </div>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end">
                                        <div class="category-food">
                                            <p class="text-muted" style="font-size: 13px">
                                                {{ $product->category->name }}
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-md-12 mt-5 d-flex justify-content-center">
                            <div class="alert alert-info">
                                Product Not Found
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection