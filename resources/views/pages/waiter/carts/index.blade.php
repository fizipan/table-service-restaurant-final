@extends('layouts.dashboard-waiter')

@section('title')
    Cart | SientaResto
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
        id="appCart"
        >
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Cart</h2>
            <p class="dashboard-subtitle">
                Big result start from the small one
            </p>
            </div>
            <div class="dashboard-content">
                @if (session()->has('success'))
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            <strong>{{ session()->get('success') }}</strong>,  
                                <a href="{{ route('buy-product.index')  }}" class="btn-link">
                                    ingin pesan lagi ?
                                </a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> 
                    </div>
                </div>
                @endif
            <div class="row">
                <div class="col-12 mt-2">
                    <section class="cart-product" id="cart-product">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="table-responsive">
                                    <table
                                    class="table table-borderless table-cart overflow-auto"
                                    >
                                    <thead>
                                        <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_price = 0;
                                        @endphp
                                        @forelse ($carts as $cart)
                                        <tr>
                                            <td style="width: 20%">
                                                <img
                                                src="{{ Storage::url($cart->product->photo) }}"
                                                style="max-height: 70px"
                                                alt=""
                                                />
                                            </td>
                                            <td style="width: 35%">
                                                <div class="title-text">
                                                    {{ $cart->product->name }}
                                                </div>
                                                <div class="text-secondary">
                                                    {{ $cart->product->category->name }}
                                                </div>
                                            </td>
                                            <td style="width: 25%">
                                                <div class="price-product">
                                                    IDR {{ number_format($cart->product->price) }}
                                                </div>
                                            </td>
                                            <td style="width: 20%">
                                                <form action="{{ route('carts.destroy', $cart->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                    type="submit"
                                                    class="btn btn-remove">
                                                        Remove
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $total_price += $cart->product->price;
                                        @endphp
                                        @empty
                                            <div class="row">
                                                <div class="d-flex justify-content-center col-md-12">
                                                    <div class="alert alert-info">
                                                        Cart Not Found
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <section class="data-user mt-2" id="data-user">
                            <div class="container">
                            <div class="row">
                                <div class="col-12 mb-2">
                                <h5>Data User</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="custumer_name">Nama Pelanggan</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    name="custumer_name"
                                    id="custumer_name"
                                    />
                                    @error('custumer_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">No. HP</label>
                                    <input
                                    type="number"
                                    name="phone_number"
                                    id="phone_number"
                                    class="form-control"
                                    />
                                    @error('phone_number')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br />
                                        <div
                                        class="custom-control custom-radio custom-control-inline"
                                        >
                                        <input
                                            type="radio"
                                            id="laki-laki"
                                            name="gender"
                                            class="custom-control-input"
                                            value="Laki-Laki"
                                            checked
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="laki-laki"
                                            >Laki - Laki</label
                                        >
                                        </div>
                                        <div
                                        class="custom-control custom-radio custom-control-inline"
                                        >
                                        <input
                                            type="radio"
                                            id="perempuan"
                                            name="gender"
                                            class="custom-control-input"
                                            value="Perempuan"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="perempuan"
                                            >Perempuan</label
                                        >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea
                                    name="address"
                                    id="address"
                                    class="form-control"
                                    ></textarea>
                                    @error('address')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <div class="row justify-content-between mt-4">
                                <div class="col-md-4">
                                <div class="card input-meja mb-4">
                                    <div class="card-header">
                                    <p>input meja</p>
                                    </div>
                                    <div class="card-body">
                                    <div class="form-group">
                                        <label for="tables_id"
                                        >Number Table</label
                                        >
                                        <select name="tables_id" v-model="table" id="tables_id" class="form-control">
                                            @foreach ($tables as $table)
                                                <option value="{{ $table->id }}">{{ $table->number_table }}</option>
                                            @endforeach
                                        </select>
                                        @error('tables_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header">Data Meja</div>
                                    <div
                                    class="card-body d-flex flex-wrap justify-content-center"
                                    >
                                        @foreach ($tables as $table)
                                            <div class="data-meja">{{ $table->number_table }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </section>

                        <section class="payment mt-4 mb-5" id="payment">
                            <div class="container">
                            <div class="row">
                                <div class="col-12">
                                <h5>Payment Information</h5>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-between">
                                <div class="col-md-3">
                                <div class="count font-weight-bold" v-if="table">No @{{ table }}</div>
                                <div class="count font-weight-bold" v-else>No 0</div>
                                <div class="text-muted">Meja</div>
                                </div>
                                <div class="col-md-3">
                                <div class="count font-weight-bold">
                                    {{ $countCart }} Product
                                </div>
                                <div class="text-muted">Jumlah product</div>
                                </div>
                                <div class="col-md-3">
                                <input type="hidden" name="total_price" value="{{ $total_price }}">
                                <div
                                    class="count font-weight-bold text-success"
                                >
                                    IDR {{ number_format($total_price) }}
                                </div>
                                <div class="text-muted">Total</div>
                                </div>
                                <div class="col-md-3">
                                <button
                                    type="submit"
                                    class="btn btn-success px-4 py-2"
                                >
                                    Checkout Now
                                </button>
                                </div>
                            </div>
                            </div>
                        </section>
                    </form>
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
                table: '',
            }
        });
    </script>
@endpush
