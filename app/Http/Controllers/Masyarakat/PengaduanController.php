<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = Auth::guard('masyarakat')->user();
        $nik = $masyarakat->nik;

        $pengaduan = Pengaduan::where('nik_masyarakat', $nik)->get();
        $data['pengaduan'] = $pengaduan;
        $data['masyarakat'] = $masyarakat;

        // dd($data);

        return view('masyarakat.pengaduan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masyarakat = Auth::guard('masyarakat')->user();
        $data['masyarakat'] = $masyarakat;

        return view('masyarakat.pengaduan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masyarakat = Auth::guard('masyarakat')->user();
        $nik = $masyarakat->nik;

        $pengaduan = new Pengaduan();

        $pengaduan->tgl_pengaduan = date('Y-m-d H:i:s');
        $pengaduan->nik_masyarakat = $nik;
        $pengaduan->judul_pengaduan = $request->judul_pengaduan;
        $pengaduan->isi_pengaduan = $request->isi_pengaduan;

        if($request->hasFile('foto_pengaduan'))
        {
            $request->file('foto_pengaduan')->move('foto-pengaduan/', $request->file('foto_pengaduan')->getClientOriginalName());
            $pengaduan->foto_pengaduan = $request->file('foto_pengaduan')->getClientOriginalName();
        }

        $pengaduan->status = '0';

        $pengaduan->save();

        return redirect()->route('masyarakat.pengaduan.index')->with('success', 'Berhasil Menambahkan Pengaduan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $masyarakat = Auth::guard('masyarakat')->user();
        $pengaduan = Pengaduan::find($id);

        $data['masyarakat'] = $masyarakat;
        $data['pengaduan'] = $pengaduan;

        // dd($data);
        return view('masyarakat.pengaduan.detail', $data);
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
}
