<?php

namespace App\Http\Controllers;

use App\Models\JenisHotel;
use App\Models\JenisTempatWisata;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TempatWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tempatwisata = TempatWisata::join('tb_jenis_tempat_wisata', 'tb_jenis_tempat_wisata.id_jenis_tempat_wisata', 'tb_tempat_wisata.id_jenis_tempat_wisata')
        ->select('tb_tempat_wisata.*','tb_jenis_tempat_wisata.*')
        ->paginate(10);
        return view('tempat-wisata/tempat-wisata', compact('tempatwisata'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['jenistempatwisata'] = JenisTempatWisata::all();
        return view('tempat-wisata/tambah-tempat-wisata',$data);
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
            'id_jenis_tempat_wisata' => 'required',
            'nama_tempat_wisata' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'harga_tiket' => 'required',
        ]);

        TempatWisata::create([
            'id_tempat_wisata' => rand(),
            'id_jenis_tempat_wisata'  => $request->id_jenis_tempat_wisata,
            'nama_tempat_wisata' => $request->nama_tempat_wisata,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'harga_tiket' => $request->harga_tiket,
        ]);
        return redirect("tempat-wisata")->with("message", "Data berhasil disimpan");
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
    public function edit(TempatWisata $tempat_wisata)
    {
        $data ['tempat_wisata'] = TempatWisata::all();
        $data ['jenistempatwisata'] = JenisTempatWisata::all();
        return view('tempat-wisata/edit-tempat-wisata',compact('tempat_wisata'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TempatWisata $tempat_wisata)
    {
        $request->validate([
            'id_jenis_tempat_wisata' => 'required',
            'nama_tempat_wisata' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'harga_tiket' => 'required',
        ]);

        $tempat_wisata->update([
            'id_tempat_wisata' => rand(),
            'id_jenis_tempat_wisata'  => $request->id_jenis_tempat_wisata,
            'nama_tempat_wisata' => $request->nama_tempat_wisata,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'harga_tiket' => $request->harga_tiket,
        ]);
        return redirect("tempat-wisata")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatWisata $tempat_wisata)
    {
        $tempat_wisata->delete();
        return redirect("tempat-wisata")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $tempat_wisata = TempatWisata::join('tb_jenis_tempat_wisata', 'tb_jenis_tempat_wisata.id_jenis_tempat_wisata', 'tb_tempat_wisata.id_jenis_tempat_wisata')
        ->select('tb_tempat_wisata.*','tb_jenis_tempat_wisata.*')
        ->get();
        $pdf = Pdf::loadview('tempat-wisata\laporan-tempat-wisata', ['tempat-wisata' => $tempat_wisata])->setPaper('a4');
        return $pdf->download('laporan-tempat-wisata.pdf');
    }
}
