<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data pkl - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pkl.update', $pkl->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <select class="form-control" name="id_siswa" id="id_siswa">
                                    <option value="{{ $pkl->siswa->id }}">{{ old('id_siswa', $pkl->siswa->nama) }}</option>
                                    @foreach ($siswa as $siswas)
                                        <option value="{{ $siswas->id }}">{{ $siswas->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- error message untuk title -->
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Dudi</label>
                                <select class="form-control" name="id_dudi" id="id_dudi">
                                    <option value="{{ $pkl->dudi->id }}">{{ old('id_dudi', $pkl->dudi->nama) }}</option>
                                    @foreach ($alamat as $alamats)
                                        <option value="{{ $alamats->id }}">{{ $alamats->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <!-- error message untuk title -->
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL KEMBALI</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk"
                                        value="{{ old('tgl_masuk', $pkl->tgl_masuk) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL KEMBALI</label>
                                <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar"
                                    value="{{ old('tgl_keluar', $pkl->tgl_keluar) }}" required>
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script></script>
</body>

</html>
