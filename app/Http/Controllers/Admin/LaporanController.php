<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Pengaduan::with('masyarakat')->get();
        $data['laporan'] = $laporan;

        // dd($data);
        return view('admin.laporan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $bruh = Tanggapan::where('id_pengaduan', $id)->get();
        $laporan = Pengaduan::with('masyarakat')->find($id);
        $cek = Tanggapan::where('id_pengaduan', $id)->count();

        $data['laporan'] = $laporan;
        $data['tanggapan'] = $cek;
        // $data['bruh'] = $bruh;

        // dd($data);
        return view('admin.laporan.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function updateStatus($id)
    {
        $laporan = Pengaduan::find($id);
        $status = $laporan->status;

        if($status == '0') {
            $laporan->status = 'proses';
        } else{ 
            $laporan->status = '0';
        }

        $laporan->save();
        
        return redirect()->route('admin.laporan.index')->with('success', 'Status Berhasil Diubah!');
    }

    public function statusSelesai($id)
    {
        $laporan = Pengaduan::find($id);
        $status = $laporan->status;

        if($status == 'proses'){
            $laporan->status = 'selesai';
        }

        $laporan->save();

        return redirect()->route('admin.laporan.show', $id)->with('success', 'Laporan Tervalidasi');
    }



    public function ruteTanggapan($id)
    {
        $laporan = Pengaduan::with(['masyarakat', 'tanggapan'])->findOrFail($id);
        $data['laporan'] = $laporan;

        return view('admin.laporan.tanggapan', $data);
    }

    public function beriTanggapan(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);

        $tanggapan = new Tanggapan();

        $tanggapan->id_pengaduan = $pengaduan->id;
        $tanggapan->tgl_tanggapan = date('Y-m-d H:i:s');
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->id_petugas = Auth::id();

        $tanggapan->save();

        // $pengaduan->status = 'selesai';
        // $pengaduan->save();

        return redirect()->route('admin.laporan.show', $id)->with('success', 'Berhasil Menanggapi');
    }
}
