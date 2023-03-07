@extends('layouts.main')
@section('title', 'Cetak Laporan')
@section('CetakLaporanActive', 'active')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cetak Laporan</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email2">Tanggal Awal</label>
                    <input type="date" class="form-control" name="tglawal" id="tglawal">
                </div>
				<div class="form-group">
                    <label for="email2">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tglakhir" id="tglakhir">
                </div>
				<div class="card-action">
                    <a href="" type="submit" class="btn btn-success" onclick="this.href='/admin/cetak/cetak-data/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank"><i class="fas fa-print"></i> Cetak</a>
                </div>
            </div>
        </div>
    </div>
@endsection
