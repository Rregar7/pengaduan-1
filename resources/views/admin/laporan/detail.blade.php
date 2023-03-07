@extends('layouts.main')
@section('title', 'Laporan Detail')
@section('LaporanActive', 'active')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="justify-content-center d-flex">
					<h1 class="card-title">{{ $laporan->judul_pengaduan }}</h1>

					@if ($tanggapan == 0 && $laporan->status == 'proses')
						<a class="btn btn-primary btn-round ml-auto" href="{{ route('admin.laporan.ruteTanggapan', $laporan->id) }}">
							<i class="fa fa-plus"></i>
							Beri Tanggapan
						</a>
					@else
						<a class="btn btn-primary btn-round ml-auto" disabled="disabled">
							<i class="fa fa-plus"></i>
							Beri Tanggapan
						</a>
					@endif

				</div>
            </div>

            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-dark"></th>
                            <th scope="col" style="width: 75%; background:black;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>NIK</td>
                            <td>{{ $laporan->masyarakat->nik }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $laporan->masyarakat->nama }}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>{{ $laporan->masyarakat->username }}</td>
                        </tr>
                        <tr>
                            <td>No. Telpon</td>
                            <td>{{ $laporan->masyarakat->telp }}</td>
                        </tr>
                        <tr>
                            <th scope="col" class="bg-dark"></th>
                            <th scope="col" style="width: 75%; background:black;"></th>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>{{ $laporan->judul_pengaduan }}</td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td>{{ $laporan->isi_pengaduan }}</td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td><img src="{{ asset('foto-pengaduan/' . $laporan->foto_pengaduan) }}" alt="Foto"
                                    style="width: 300px"></td>
                        </tr>
						<tr>
                            <td>Status</td>
                            <td><strong>{{ ucFirst($laporan->status) }}</strong></td>
                        </tr>
                        <tr>
                            <th scope="col" class="bg-dark"></th>
                            <th scope="col" style="width: 75%; background:black;"></th>
                        </tr>
                        <tr>
                            <td>Tanggapan</td>
                            <td>
								{{ $laporan->tanggapan->tanggapan ?? '-' }}
							</td>
                        </tr>
                        <tr>
                            <th scope="col" class="bg-dark"></th>
                            <th scope="col" style="width: 75%; background:black;"></th>
                        </tr>

                    </tbody>
                </table>

            </div>

            <div class="card-footer">
                <div class="justify-content-end d-flex">
                    @if ($laporan->status == 'selesai')
                        {{-- <a class="btn btn-success btn-round mr-2 text-white" type="button"
                            href="{{ route('admin.laporan.statusSelesai', $laporan->id) }}"
                            onclick="return confirm('Apakah Anda Ingin Verifikasi Pengaduan Ini?')">
                            <span class="btn-label">
                                <i class="fa fa-archive"></i>
                            </span>
                            Validasi
                        </a> --}}
						<button class="btn btn-success btn-round mr-2" disabled="disabled">
                            <span class="btn-label">
                                <i class="fa fa-check"></i>
                            </span>
                            Selesai
                        </button>
					@elseif($laporan->status == '0')
						<button class="btn btn-success btn-round mr-2" disabled="disabled">
                            <span class="btn-label">
                                <i class="fa fa-archive"></i>
                            </span>
                            Validasi
                        </button>
                    @else
                        {{-- <button class="btn btn-success btn-round mr-2" disabled="disabled">
                            <span class="btn-label">
                                <i class="fa fa-check"></i>
                            </span>
                            Selesai
                        </button> --}}
						<a class="btn btn-success btn-round mr-2 text-white" type="button"
                            href="{{ route('admin.laporan.statusSelesai', $laporan->id) }}"
                            onclick="return confirm('Apakah Anda Ingin Verifikasi Pengaduan Ini?')">
                            <span class="btn-label">
                                <i class="fa fa-archive"></i>
                            </span>
                            Validasi
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
