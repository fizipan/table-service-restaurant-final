@extends('layouts.app')

@section('title', 'SientaResto')

@section('content')
    <div class="page-content page-home">
        <section class="hero-image" id="hero-image" data-aos="zoom-in"data-aos-delay="100">
            <div class="container">
                <div class="row">
                <div class="col-lg-12">
                    <div
                    id="carouselExampleIndicators"
                    class="carousel slide"
                    data-ride="carousel"
                    >
                    <ol class="carousel-indicators">
                        <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="0"
                        class="active"
                        ></li>
                        <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="1"
                        ></li>
                        <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="2"
                        ></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img
                            src="/images/hero-image.png"
                            class="d-block w-100"
                            alt="..."
                        />
                        </div>
                        <div class="carousel-item">
                        <img
                            src="/images/hero-image.png"
                            class="d-block w-100"
                            alt="..."
                        />
                        </div>
                        <div class="carousel-item">
                        <img
                            src="/images/hero-image.png"
                            class="d-block w-100"
                            alt="..."
                        />
                        </div>
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#carouselExampleIndicators"
                        role="button"
                        data-slide="prev"
                    >
                        <span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"
                        ></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#carouselExampleIndicators"
                        role="button"
                        data-slide="next"
                    >
                        <span
                        class="carousel-control-next-icon"
                        aria-hidden="true"
                        ></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="adventege" id="adventege">
            <div class="container">
                <div class="row">
                <div class="col-12">
                    <h5>Adventeges</h5>
                    <hr />
                </div>
                </div>
                <div class="row justify-content-center">
                <div
                    class="col-6 col-md-4"
                    data-aos="fade-down"
                    data-aos-delay="100"
                >
                    <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center align-content-center">
                        <div class="col-10 col-md-4">
                            <div class="adventeges-thumbnail mb-lg-0 mb-2">
                            <img src="/images/fast.svg" class="w-100" alt="" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div
                            class="adventege-description text-center text-lg-left"
                            >
                            <div class="title-text">Fast Delivery</div>
                            <div class="subtitle-text">
                                Sed porttitor lectus nibh in faucibus orci
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div
                    class="col-6 col-md-4"
                    data-aos="fade-down"
                    data-aos-delay="200"
                >
                    <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center align-content-center">
                        <div class="col-10 col-md-4">
                            <div class="adventeges-thumbnail mb-lg-0 mb-2">
                            <img src="/images/money.svg" class="w-100" alt="" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div
                            class="adventege-description text-center text-lg-left"
                            >
                            <div class="title-text">More Efficient</div>
                            <div class="subtitle-text">
                                Sed porttitor lectus nibh in faucibus orci
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div
                    class="col-6 col-md-4"
                    data-aos="fade-down"
                    data-aos-delay="300"
                >
                    <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center align-content-center">
                        <div class="col-10 col-md-4">
                            <div class="adventeges-thumbnail mb-lg-0 mb-2">
                            <img src="/images/env.svg" class="w-100" alt="" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div
                            class="adventege-description text-center text-lg-left"
                            >
                            <div class="title-text">Environment Friendly</div>
                            <div class="subtitle-text">
                                Sed porttitor lectus nibh in faucibus orci
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <section class="favorite product" id="favorite">
            <div class="container">
                <div class="row">
                <div class="col-12">
                    <h5>Favorite Food</h5>
                    <hr />
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
                    <div class="col-12 d-flex justify-content-center">
                        <a href="{{ route('product') }}" class="btn btn-outline-secondary px-4 py-2"
                        >Lihat Semua</a
                        >
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection