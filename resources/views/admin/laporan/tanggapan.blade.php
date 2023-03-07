@extends('layouts.main')
@section('title', 'Laporan')
@section('LaporanActive', 'active')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="card-title">Pengaduan : {{ $laporan->judul_pengaduan }} -
                    {{ date('d-m-Y', strtotime($laporan->tgl_pengaduan)) }}</h1>
            </div>

            <div class="col-md-9">
                <form method="POST" action="{{ route('admin.laporan.beriTanggapan.post', $laporan->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="exampleFormControlTextarea1">Tanggapan Pengaduan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tanggapan"></textarea>
                    </div>

                    <div class="card-action justify-content-end d-flex mt-2">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>

            </div>
        </div>



    </div>
@endsection
