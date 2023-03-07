@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header justify-content-center d-flex">
                        <h4>{{ $pengaduan->judul_pengaduan }}</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                            <div class="jumbotron jumbotron-fluid pt-1" style="background: #e7ebec;">
                                <div class="container">
                                    <p class="text-end" style="font-weight:800;"><i class="bi bi-calendar"></i> :
                                        {{ $pengaduan->tgl_pengaduan }}</p>
                                    <p class="lead pb-2">{{ $pengaduan->isi_pengaduan }}</p>
									<img src="{{ asset('foto-pengaduan/'. $pengaduan->foto_pengaduan) }}" alt="ddd" style="width: 100px">
                                </div>
                            </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
