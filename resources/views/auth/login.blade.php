@extends('layouts.auth')

@section('title')
    Login | SientaResto
@endsection

@section('content')
<div class="page-login">
    <div class="form-login" data-aos="fade-right">
        <div class="container">
            <div class="row justify-content-around">
            <div class="col-md-8">
                <div class="logo mb-5">
                    <a href="{{ route('home') }}">
                        <img src="/images/Logo.svg" alt="" />
                    </a>
                </div>
                <div class="header-login mb-4">
                <h5>Login.</h5>
                <p class="subtitle-text">
                    Vestibulum ac diam sit amet quam vehicula elementum
                </p>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="Email">Your Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="button-container mt-5">
                    <button type="submit" class="btn btn-login btn-block">
                    Login
                    </button>
                    <a href="{{ route('home') }}" class="btn btn-back btn-block mt-3"
                    >Kembali Ke Home</a
                    >
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="ilustrasi d-none d-lg-block">
        <div class="container-fluid">
            <div class="row justify-content-center my-5 text-center">
            <div class="col-10" data-aos="zoom-in" data-aos-delay="100">
                <div class="thumbnail-ilustrasi">
                <img
                    src="/images/icon-login.png"
                    class="ilustrasi-img w-75"
                    alt=""
                />
                </div>
                <div class="description-login" data-aos="fade-down" data-aos-delay="200">
                <div class="title-text">Take Whatever You want</div>
                <p class="subtitle-text">
                    Proin eget tortor risus. Quisque velit nisi, pretium ut
                    lacinia in, elementum id enim. Quisque velit nisi, pretium ut
                    lacinia in, elementum id enim.
                </p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection