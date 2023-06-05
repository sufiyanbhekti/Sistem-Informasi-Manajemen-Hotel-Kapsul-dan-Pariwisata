<?php

namespace App\Http\Controllers;

use App\Models\ObjekAtraksi;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ObjekAtraksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objekatraksi = ObjekAtraksi::join('tb_tempat_wisata', 'tb_tempat_wisata.id_tempat_wisata', 'tb_objek_atraksi.id_tempat_wisata')
        ->select('tb_objek_atraksi.*', 'tb_tempat_wisata.*')
        ->paginate(10);
        return view('objek-atraksi/objek-atraksi', compact('objekatraksi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tempatwisata'] = TempatWisata::all();
        return view('objek-atraksi/tambah-objek-atraksi',$data);
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
            'id_tempat_wisata' => 'required',
            'nama' => 'required',
            'tipe_atraksi' => 'required',
            'kapasitas_atraksi' => 'required',
        ]);

        ObjekAtraksi::create([
            'id_objek_atraksi' => rand(),
            'id_tempat_wisata' => $request->id_tempat_wisata,
            'nama'  => $request->nama,
            'tipe_atraksi' => $request->tipe_atraksi,
            'kapasitas_atraksi' => $request->kapasitas_atraksi,
        ]);
        return redirect("objek-atraksi")->with("message", "Data berhasil disimpan");
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
    public function edit(ObjekAtraksi $objek_atraksi)
    {
        $data['tempatwisata'] = TempatWisata::all();
        $data ['objek_atraksi'] = ObjekAtraksi::all();
        return view('objek-atraksi/edit-objek-atraksi', compact('objek_atraksi'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ObjekAtraksi $objek_atraksi)
    {
        $request->validate([
            'id_tempat_wisata' => 'required',
            'nama' => 'required',
            'tipe_atraksi' => 'required',
            'kapasitas_atraksi' => 'required',
        ]);

        $objek_atraksi->update([
            'id_objek_atraksi' => rand(),
            'id_tempat_wisata' => $request->id_tempat_wisata,
            'nama'  => $request->nama,
            'tipe_atraksi' => $request->tipe_atraksi,
            'kapasitas_atraksi' => $request->kapasitas_atraksi,
        ]);
        return redirect("objek-atraksi")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($objek_atraksi)
    {
        $objek_atraksi->delete();
        return redirect("objek-atraksi")->with("message", "Data berhasil disimpan");
    }
    public function print()
    {
        $objek_atraksi = ObjekAtraksi::join('tb_tempat_wisata', 'tb_tempat_wisata.id_tempat_wisata', 'tb_objek_atraksi.id_tempat_wisata')
        ->select('tb_objek_atraksi.*', 'tb_tempat_wisata.*')
        ->get();
        $pdf = Pdf::loadview('objek-atraksi\laporan-objek-atraksi', ['objek-atraksi' => $objek_atraksi])->setPaper('a4');
        return $pdf->download('laporan-objek-atraksi.pdf');
    }
}
