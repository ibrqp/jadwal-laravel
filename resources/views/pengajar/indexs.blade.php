@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('pengajar.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PENGAJAR</a>
                        <a href="{{ route('mapel.index') }}" class="btn btn-md btn-primary mb-3">DATA MAPEL</a>
                        <a href="{{ route('guru.index') }}" class="btn btn-md btn-primary mb-3">DATA GURU</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">GURU</th>
                                    <th scope="col">MAPEL</th>
                                    <th scope="col">KELAS</th>
                                    <th scope="col">JAM PELAJARAN</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajars as $pengajar)
                                    <tr>
                                        <td>{{ $pengajar->guru->nama }}</td>
                                        <td>{{ $pengajar->mapel->nama_mapel }}</td>
                                        <td>{{ $pengajar->kelas }}</td>
                                        <td>{{ $pengajar->jam_pelajaran }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('pengajar.destroy', $pengajar->id) }}" method="POST">
                                                <a href="{{ route('pengajar.edit', $pengajar->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Pengajar belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pengajars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
