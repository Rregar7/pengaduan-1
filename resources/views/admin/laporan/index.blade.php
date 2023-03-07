@extends('layouts.main')
@section('title', 'Laporan')
@section('LaporanActive', 'active')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Laporan Masyarakat</h4>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th style="width: 7%">Action</th>
                                <th style="width: 7%">Validasi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Validasi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($laporan as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item->masyarakat->nama }}</td>
                                    <td>{{ $item->masyarakat->nik }}</td>
                                    <td>{{ $item->judul_pengaduan }}</td>
                                    <td><img src="{{ asset('foto-pengaduan/' . $item->foto_pengaduan) }}" alt="Foto"
                                            style="width: 40px"></td>
                                    <td>{{ ucFirst($item->status) }}</td>
                                    <td>
                                        <div class="form-button-action justify-content-center d-flex">
                                            @if ($item->status == '0')
                                                <a class="btn btn-success" type="button" href="{{ route('admin.laporan.updateStatus', $item->id) }}" onclick="return confirm('Apakah anda yakin ingin memproses laporan?')">
                                                    <span class="btn-label">
                                                        {{-- <i class="fa fa-check"></i> --}}
                                                    </span>
                                                    Proses
                                                </a>
                                            @elseif($item->status == 'proses')
                                                <a class="btn btn-warning" type="button" href="{{ route('admin.laporan.updateStatus', $item->id) }}" onclick="return confirm('Apakah anda yakin ingin menunda laporan?')">
                                                    <span class="btn-label">
                                                        <i class="fa fa-exclamation-circle"></i>
                                                    </span>
                                                    Pending
                                                </a>
                                            @else
                                                <button class="btn btn-success" disabled="disabled">Selesai</button>
                                            @endif
                                            

                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-button-action justify-content-center d-flex">
                                            @if ($item->status == '0')
                                                <button class="btn btn-info" disabled="disabled">
                                                    <span class="btn-label">
                                                        <i class="fa fa-info"></i>
                                                    </span>
                                                    Detail
                                                </button>
                                            @else
                                                <a class="btn btn-info" type="button" href="{{ route('admin.laporan.show', $item->id) }}">
                                                    <span class="btn-label">
                                                        <i class="fa fa-info"></i>
                                                    </span>
                                                    Detail
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            $('#add-row').DataTable({});
        </script>
    @endsection
