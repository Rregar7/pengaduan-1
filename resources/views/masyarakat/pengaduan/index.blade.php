@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header justify-content-end d-flex">
                        <a class="btn btn-primary" href="{{ route('masyarakat.pengaduan.create') }}" type="button">Tambah
                            Pengaduan</a>
                    </div>
                    <div class="card-body">
                        <h4>Pengaduan Anda :</h4>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:10%;">No</th>
                                    <th scope="col" style="width:20%;">Tanggal</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col" style="width:10%;">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengaduan as $p)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $p->tgl_pengaduan }}</td>
                                        <td>{{ $p->judul_pengaduan }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('masyarakat.pengaduan.show', $p->id) }}"
                                                type="button">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Tidak Ada Pengaduan</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
