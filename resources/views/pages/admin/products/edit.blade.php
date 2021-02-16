@extends('layouts.dashboard-admin')

@section('title')
    Details Product | SientaResto
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $product->name }}</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
            <div class="col-12 mt-2">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') ?? $product->name }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') ?? $product->price }}">
                            @error('price')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="categories_id">Category</label>
                            <select name="categories_id" id="categories_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $product->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <select name="stock" id="stock" class="form-control">
                                <option value="ADA">ADA</option>
                                <option selected value="{{ $product->stock }}">{{ $product->stock }}</option>
                                <option value="KOSONG">Kosong</option>
                            </select>
                            @error('stock')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="photo">Thumbnails</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                <p class="text-danger">Ukuran harus 200 x 200</p>
                                @error('photo')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12">
                        <button type="submit" name="save" class="btn btn-success btn-block py-2">Update
                            Product</button>
                            <button type="button" class="btn btn-danger btn-block py-2" data-toggle="modal" data-target="#exampleModal">
                                Delete Product
                            </button>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you Sure to Delete <span class="text-danger">"{{ $product->name }}" ?</span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Product</button>
            </form>
        </div>
        </div>
    </div>
</div>
