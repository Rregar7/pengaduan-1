<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Pegawai</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <h1 class="text-center">Data Pengaduan</h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
					@foreach ($cetakLaporan as $c)
						<tr>
							<th>{{ $loop->iteration }}</th>
							<td>{{ $c->masyarakat->nama }}</td>
							<td>{{ $c->judul_pengaduan }}</td>
							<td>{{ date('d-m-Y', strtotime($c->tgl_pengaduan)) }}</td>
						</tr>
					@endforeach

                    
                </tbody>
            </table>
        </div>
    </div>

	<script type="text/javascript">
		window.print();
	</script>
</body>

</html>
