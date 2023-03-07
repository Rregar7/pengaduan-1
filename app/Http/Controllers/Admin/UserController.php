<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('level', 'petugas')->get();
        $data['user'] = $user;

        return view('admin.petugas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = new User();

        // $data->name = $request->name;
        // $data->username = $request->username;
        // $data->telp = $request->telp;
        // $data->password = bcrypt($request->password);
        // $data->level = 'petugas';

        // $data->save();

        // return redirect()->route('admin.petugas.index')->with('success', 'Data Berhasil Ditambahkan');

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required',
                'telp' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = new User();

            $data->name = $request->name;
            $data->username = $request->username;
            $data->telp = $request->telp;
            $data->password = bcrypt($request->password);
            $data->level = 'petugas';

            $data->save();

            return redirect()->route('admin.petugas.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.petugas.edit', compact('user'));
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
        $user = User::find($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->telp = $request->telp;

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->level = 'petugas';

        $user->save();

        return redirect()->route('admin.petugas.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('admin.petugas.index')->with('success', 'Data Berhasil Dihapus');
    }
}
