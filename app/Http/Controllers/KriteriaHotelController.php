<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\KriteriaHotel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KriteriaHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteriahotel = KriteriaHotel::join('tb_hotel', 'tb_hotel.id_hotel', 'tb_kriteria_hotel.id_hotel')
        ->select('tb_kriteria_hotel.*','tb_hotel.*')
        ->paginate(10);
        return view('kriteria-hotel/kriteria-hotel', compact('kriteriahotel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['hotel'] = Hotel::all();
        return view('kriteria-hotel/tambah-kriteria-hotel',$data);
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
            'id_hotel' => 'required',
            'nama' => 'required',
            'rating' => 'required',
            'deskripsi' => 'required',
        ]);

        KriteriaHotel::create([
            'id_kriteria_hotel' => rand(),
            'id_hotel'  => $request->id_hotel,
            'nama' => $request->nama,
            'rating' => $request->rating,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("kriteria-hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KriteriaHotel $kriteria_hotel)
    {
        $data ['kriteria_hotel'] = KriteriaHotel::all();
        $data ['hotel'] = Hotel::all();
        return view('kriteria-hotel/edit-kriteria-hotel',compact('kriteria_hotel'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KriteriaHotel $kriteria_hotel)
    {
        $request->validate([
            'id_hotel' => 'required',
            'nama' => 'required',
            'rating' => 'required',
            'deskripsi' => 'required',
        ]);

        $kriteria_hotel->update([
            'id_kriteria_hotel' => rand(),
            'id_hotel'  => $request->id_hotel,
            'nama' => $request->nama,
            'rating' => $request->rating,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("kriteria-hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KriteriaHotel $kriteria_hotel)
    {
        $kriteria_hotel->delete();
        return redirect("kriteria-hotel")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $kriteria_hotel = KriteriaHotel::join('tb_hotel', 'tb_hotel.id_hotel', 'tb_kriteria_hotel.id_hotel')
        ->select('tb_kriteria_hotel.*','tb_hotel.*')
        ->get();
        $pdf = Pdf::loadview('kriteria-hotel\laporan-kriteria-hotel', ['kriteria-hotel' => $kriteria_hotel])->setPaper('a4');
        return $pdf->download('laporan-kriteria-hotel.pdf');
    }
}
