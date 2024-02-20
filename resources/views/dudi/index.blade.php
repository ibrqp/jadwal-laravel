@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        {{-- <a href="{{ route('dudi.create') }}" class="btn btn-md btn-success mb-3"></a> --}}
                        
                        <div class="d-flex justify-content-between mb-3">
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModals">
                                TAMBAH DUDI
                            </button>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('dudi.index') }}" class="btn btn-success mb-3 mx-1">
                                    DATA SISWA
                                </a>
                                <a href="{{ route('pkl.index') }}" class="btn btn-success mb-3">
                                    DATA PEMINJAMAN
                                </a>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dudi as $key => $dudis)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $dudis->nama }}</td>
                                        <td>{{ $dudis->alamat }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('apakah anda yakin?');"
                                                action="{{ route('dudi.destroy', $dudis->id) }}" method="POST">
                                                <a href="{{ route('dudi.edit', $dudis->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                        </td>
                                    </tr>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Dudi belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $dudi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dudi</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dudi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nama">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control" name="nama" value=""
                                placeholder="Masukkan Nama Dudi">
                            <!-- error message untuk title -->
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <input type="text" class="form-control" name="id_dudi" value=""
                                placeholder="Masukkan Alamat">
                            <!-- error message untuk title -->
                            
                        </div>

                        <div class="d-flex justify-content-end "> <!-- Added class justify-content-end -->
                            <button type="submit" class="btn btn-md btn-primary mx-1">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning mx-1">RESET</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
