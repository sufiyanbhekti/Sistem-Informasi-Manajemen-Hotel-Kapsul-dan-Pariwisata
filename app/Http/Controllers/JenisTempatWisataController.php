<?php

namespace App\Http\Controllers;

use App\Models\JenisTempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JenisTempatWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenistempatwisata = JenisTempatWisata::paginate(10);
        return view('jenis-tempat-wisata/jenis-tempat-wisata', compact('jenistempatwisata'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-tempat-wisata/tambah-jenis-tempat-wisata');
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
            'nama_jenis_wisata' => 'required',
            'deskripsi' => 'required',
        ]);

        JenisTempatWisata::create([
            'id_jenis_tempat_wisata' => rand(),
            'nama_jenis_wisata'  => $request->nama_jenis_wisata,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("jenis-tempat-wisata")->with("message", "Data berhasil disimpan");
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
    public function edit(JenisTempatWisata $jenis_tempat_wisata)
    {
        $data ['jenis_tempat_wisata'] = JenisTempatWisata::all();
        return view('jenis-tempat-wisata.edit-jenis-tempat-wisata',compact('jenis_tempat_wisata'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,JenisTempatWisata $jenis_tempat_wisata)
    {
        $request->validate([
            'nama_jenis_wisata' => 'required',
            'deskripsi' => 'required',
        ]);

        $jenis_tempat_wisata->update([
            'id_jenis_tempat_wisata' => rand(),
            'nama_jenis_wisata'  => $request->nama_jenis_wisata,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("jenis-tempat-wisata")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTempatWisata $jenis_tempat_wisata)
    {
        $jenis_tempat_wisata->delete();
        return redirect("jenis-tempat-wisata")->with("message", "Data berhasil disimpan");
    }
    public function print()
    {
        $jenis_tempat_wisata = JenisTempatWisata::get();
        $pdf = Pdf::loadview('jenis-tempat-wisata\laporan-jenis-tempat-wisata', ['jenis-tempat-wisata' => $jenis_tempat_wisata])->setPaper('a4');
        return $pdf->download('laporan-jenis-tempat-wisata.pdf');
    }
}
