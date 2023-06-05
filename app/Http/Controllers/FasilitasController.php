<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::paginate(10);
        return view('fasilitas/fasilitas', compact('fasilitas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas/tambah-fasilitas');
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
            'jenis_fasilitas' => 'required',
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
        ]);

        Fasilitas::create([
            'id_fasilitas' => rand(),
            'jenis_fasilitas'  => $request->jenis_fasilitas,
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("fasilitas")->with("message", "Data berhasil disimpan");
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
    public function edit(Fasilitas $fasilitas)
    {
        $data['fasilitas'] = Fasilitas::all();
        return view('fasilitas/edit-fasilitas', compact('fasilitas'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Fasilitas $fasilitas)
    {
        $request->validate([
            'jenis_fasilitas' => 'required',
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
        ]);

        $fasilitas->update([
            'id_fasilitas' => rand(),
            'jenis_fasilitas'  => $request->jenis_fasilitas,
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("fasilitas")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas)
    {
        $fasilitas->delete();
        return redirect("fasilitas")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $fasilitas = Fasilitas::get();
        $pdf = Pdf::loadview('fasilitas\laporan-fasilitas', ['fasilitas' => $fasilitas])->setPaper('a4');
        return $pdf->download('laporan-fasilitas.pdf');
    }
}
