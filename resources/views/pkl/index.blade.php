@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        {{-- <a href="{{ route('dudi.create') }}" class="btn btn-md btn-success mb-3"></a> --}}

                        <div class="d-flex justify-content-between mb-3">
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                data-target="#exampleModals">
                                TAMBAH Data PKL
                            </button>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('pkl.index') }}" class="btn btn-success mb-3 mx-1">
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
                                    <th scope="col">NAMA </th>
                                    <th scope="col">NAMA DUDI</th>
                                    <th scope="col">TANGGAL MASUK</th>
                                    <th scope="col">TANGGAL KELUAR</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pkl as $key => $pkls)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $pkls->siswa->nama }}</td>
                                        <td>{{ $pkls->dudi->nama }}</td>
                                        <td>{{ $pkls->tgl_masuk }}</td>
                                        <td>{{ $pkls->tgl_keluar }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('apakah anda yakin?');"
                                                action="{{ route('pkl.destroy', $pkls->id) }}" method="POST">
                                                <a href="{{ route('pkl.edit', $pkls->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data pkl belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pkl->links() }}
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pkl</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pkl.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nama">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <select class="form-control" name="id_siswa" id="id_siswa">
                                <option value="">Select Nama Siswa</option>
                                @foreach ($siswa as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- error message untuk title -->
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Dudi</label>
                            <select class="form-control" name="id_dudi" id="id_dudi">
                                <option value="">Select Nama Siswa</option>
                                @foreach ($alamat as $alamats)
                                    <option value="{{ $alamats->id }}">{{ $alamats->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- error message untuk title -->
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tgl_masuk" value=""
                                placeholder="Masukkan Alamat">
                            <!-- error message untuk title -->
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Keluar</label>
                            <input type="date" class="form-control" name="tgl_keluar" value=""
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
