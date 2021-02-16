@extends('layouts.dashboard-admin')

@section('title')
    Edit User | SientaResto
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Edit User</h2>
            <p class="dashboard-subtitle">Edit your own User</p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $user->name }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" readonly id="email" class="form-control" value="{{ old('email') ?? $user->email }}">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" value="">
                                <span class="text-info">
                                    Note : Jika tidak ingin ganti Kosongkan saja
                                </span>
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="roles_id">Role</label>
                            <select name="roles_id" id="roles_id" class="form-control">
                                @foreach ($roles as $role)
                                    <option {{ $user->roles_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name_role }}</option>
                                @endforeach
                            </select>
                            @error('roles_id')
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