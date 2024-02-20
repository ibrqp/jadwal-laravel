@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('mapel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA MAPEL</label>
                            <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" name="nama_mapel" value="{{ old('nama_mapel') }}" placeholder="Masukkan Nama">
                        
                            <!-- error message untuk title -->
                            @error('nama_mapel')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection