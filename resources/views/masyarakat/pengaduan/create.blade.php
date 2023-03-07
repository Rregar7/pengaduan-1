@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Tambah Pengaduan</h1>
            </div>

            <div class="col-md-9">
                <form method="POST" action="{{ route('masyarakat.pengaduan.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul Laporan</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="judul_pengaduan">
                    </div>

                    <div class="form-group mb-2">
                        <label for="exampleFormControlTextarea1">Isi Laporan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_pengaduan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto_pengaduan">
                    </div>

                    <div class="card-action justify-content-end d-flex mt-2">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>

            </div>
        </div>



    </div>
@endsection
