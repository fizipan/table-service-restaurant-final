@extends('layouts.dashboard-admin')

@section('title')
    Edit Category | SientaResto
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Edit Category</h2>
            <p class="dashboard-subtitle">Edit your own Category</p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                <form action="{{ route('categories.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $category->name }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="photo">Thumbnail</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                <div class="text-info">Ukuran harus 200 x 200</div>
                                @error('photo')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success px-4">Save Now</button>
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