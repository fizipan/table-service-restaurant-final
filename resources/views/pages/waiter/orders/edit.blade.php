@extends('layouts.dashboard-waiter')

@section('title')
    Details Order | SientaResto
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">#{{ $order->code }}</h2>
            <p class="dashboard-subtitle">Order Details</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
            <div class="col-12 mt-2">
                <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="custumer_name">Customer Name</label>
                            <input type="text" name="custumer_name" id="custumer_name" class="form-control"
                            value="{{ old('custumer_name') ?? $order->custumer_name }}">
                            @error('custumer_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Number Phone</label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control"
                            value="{{ old('phone_number') ?? $order->phone_number }}">
                            @error('phone_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-12">
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
                                    {{ $order->gender == "Laki-Laki" ? 'checked' : '' }}
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
                                    {{ $order->gender == "Perempuan" ? 'checked' : '' }}
                                />
                                <label
                                    class="custom-control-label"
                                    for="perempuan"
                                    >Perempuan</label
                                >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount">Jumlah Product</label>
                                <input type="number" readonly name="amount" class="form-control" id="amount" value="{{ old('amount') ?? $order->amount  }}">
                            </div>
                            @error('amount')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tables_id">Number Table</label>
                                <select name="tables_id" id="tables_id" class="form-control">
                                    @foreach ($tables as $table)
                                        <option {{ $order->tables_id == $table->id ? 'selected' : '' }} value="{{ $table->id }}">{{ $table->number_table }}</option>
                                    @endforeach
                                </select>
                                @error('tables_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control">{{ $order->address }}</textarea>
                                @error('address')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 text-right">
                        <button type="submit" name="save" class="btn btn-success py-2">Update
                            Product</button>
                        </div>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>


@endsection