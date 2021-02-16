@extends('layouts.dashboard-admin')

@section('title')
    Entri Table | SientaResto
@endsection

@section('content')
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Data Meja</h2>
                <p class="dashboard-subtitle">Look what you have made today!</p>
              </div>
              <div class="dashboard-content">
                <div class="row justify-content-between mt-4">
                  <div class="col-md-4">
                    <form action="{{ route('tables.store') }}" method="POST">
                        @csrf
                        <div class="card input-meja mb-4">
                        <div class="card-header">
                            <p>Tambah meja</p>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label for="number_table">Number Table</label>
                            <input
                                type="number"
                                name="number_table"
                                class="form-control"
                                id="number_table"
                            />
                            @error('number_table')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <button type="submit" class="btn btn-success">
                            Tambah Data
                            </button>
                        </div>
                        </div>
                    </form>
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
            </div>
          </div>
@endsection