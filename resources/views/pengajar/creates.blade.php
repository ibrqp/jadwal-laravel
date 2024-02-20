@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('pengajar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label class="font-weight-bold">NAMA GURU</label>
                            <select class="form-control" name="id_guru" id="id_guru">
                                <option value="">Select Nama Guru</option>
                                @foreach ($guru as $gurus)
                                    <option value="{{ $gurus->id }}">{{ $gurus->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">NAMA MAPEL</label>
                            <select class="form-control" name="id_mapel" id="id_mapel">
                                <option value="">Select Mapel</option>
                                @foreach ($mapel as $mapels)
                                    <option value="{{ $mapels->id }}">{{ $mapels->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-1 mt-3">
                            <label class="font-weight-bold">Kelas</label>
                            <select class="form-control" name="kelas">
                                <option value="X PPLG">X PPLG </option>
                                <option value="XI PPLG">XI RPL </option>
                                <option value="XII PPLG">XII RPL </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">JAM PELAJARAN</label>
                            <select class="form-control" name="jam_pelajaran" id="jam_pelajaran">
                                <option value=""> Pilih Jam Pelajaran</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
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