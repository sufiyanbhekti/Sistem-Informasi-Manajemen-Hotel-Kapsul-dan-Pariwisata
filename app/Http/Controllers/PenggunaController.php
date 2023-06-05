<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::paginate(10);
        return view('pengguna/pengguna', compact('pengguna'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna/tambah-pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
        ]);

        Pengguna::create([
            'id_pengguna' => rand(),
            'nama_pengguna'  => $request->nama_pengguna,
            'username' => $request->username,
            'password' => $request->password,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
        ]);
        return redirect("pengguna")->with("message", "Data berhasil disimpan");
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
    public function edit(Pengguna $pengguna)
    {
        $data['pengguna'] = Pengguna::all();
        return view('pengguna/edit-pengguna', compact('pengguna'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pengguna $pengguna)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
        ]);

        $pengguna->update([
            'id_pengguna' => rand(),
            'nama_pengguna'  => $request->nama_pengguna,
            'username' => $request->username,
            'password' => $request->password,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
        ]);
        return redirect("pengguna")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect("pengguna")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $pengguna = Pengguna::get();
        $pdf = Pdf::loadview('pengguna\laporan-pengguna', ['pengguna' => $pengguna])->setPaper('a4');
        return $pdf->download('laporan-pengguna.pdf');
    }
}
