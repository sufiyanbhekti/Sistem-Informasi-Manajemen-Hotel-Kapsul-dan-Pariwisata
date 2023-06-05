<?php

namespace App\Http\Controllers;

use App\Models\JenisHotel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JenisHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenishotel = JenisHotel::paginate(10);
        return view('jenis-hotel/jenis-hotel', compact('jenishotel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-hotel/tambah-jenis-hotel');
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
            'nama_jenis_hotel' => 'required',
            'deskripsi' => 'required',
        ]);

        JenisHotel::create([
            'id_jenis_hotel' => rand(),
            'nama_jenis_hotel' => $request->nama_jenis_hotel,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("jenis-hotel")->with("message", "Data berhasil disimpan");
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
    public function edit(JenisHotel $jenishotel)
    {
        $data ['jenishotel'] = JenisHotel::all();
        return view('jenis-hotel/edit-jenis-hotel', compact('jenishotel'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,JenisHotel $jenishotel)
    {
        $request->validate([
            'nama_jenis_hotel' => 'required',
            'deskripsi' => 'required',
        ]);

        $jenishotel->update([
            'id_jenis_hotel' => rand(),
            'nama_jenis_hotel'  => $request->nama_jenis_hotel,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("jenis-hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisHotel $jenishotel)
    {
        $jenishotel -> delete();
        return redirect("jenis-hotel")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $jenishotel = JenisHotel::get();
        $pdf = Pdf::loadview('jenis-hotel\laporan-jenis-hotel', ['jenis-hotel' => $jenishotel])->setPaper('a4');
        return $pdf->download('laporan-jenis-hotel.pdf');
    }
}
