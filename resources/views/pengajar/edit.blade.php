@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pengajar.update', $pengajar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')



                            <div class="form-group">
                                <label class="font-weight-bold">NAMA GURU</label>
                                <select class="form-control" name="id_guru" id="id_guru">
                                    <option value="">Select Mapel</option>
                                    @foreach ($guru as $gurus)
                                        <option value="{{ $gurus->id }}" {{ $gurus->id == $pengajar->id_guru ? 'selected' : '' }}>
                                            {{ $gurus->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA MAPEL</label>
                                <select class="form-control" name="id_mapel" id="id_mapel">
                                    <option value="">Select Mapel</option>
                                    @foreach ($mapel as $mapels)
                                        <option value="{{ $mapels->id }}" {{ $mapels->id == $pengajar->id_mapel ? 'selected' : '' }}>
                                            {{ $mapels->nama_mapel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <select class="form-control" name="kelas">
                                    <option value="X PPLG" {{ old('kelas', $pengajar->kelas) === 'X PPLG' ? 'selected' : '' }}>X PPLG </option>
                                    <option value="XI PPLG" {{ old('kelas', $pengajar->kelas) === 'XI PPLG' ? 'selected' : '' }}>XI RPL </option>
                                    <option value="XII PPLG" {{ old('kelas', $pengajar->kelas) === 'XII PPLG' ? 'selected' : '' }}>XII RPL </option>
                                </select>
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JAM PELAJARAN</label>
                                <select class="form-control" name="jam_pelajaran">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" {{ $i == $pengajar->jam_pelajaran ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                @error('jam_pelajaran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
