<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\JenisHotel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::join('tb_jenis_hotel', 'tb_jenis_hotel.id_jenis_hotel', 'tb_hotel.id_jenis_hotel')
        ->select('tb_hotel.*', 'tb_jenis_hotel.*')
        ->paginate(10);
        return view('hotel/hotel', compact('hotel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jenishotel'] = JenisHotel::all();
        return view('hotel/tambah-hotel', $data);
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
            'id_jenis_hotel' => 'required',
            'nama_hotel' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'gambar_hotel' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',

        ]);

        Hotel::create([
            'id_hotel' => rand(),
            'id_jenis_hotel'  => $request->id_jenis_hotel,
            'nama_hotel' => $request->nama_hotel,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'gambar_hotel' => $request->gambar_hotel,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);
        return redirect("hotel")->with("message", "Data berhasil disimpan");
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
    public function edit(Hotel $hotel)
    {
        $data['hotel'] = Hotel::all();
        $data ['jenishotel'] = JenisHotel::all();
            return view('hotel/edit-hotel', compact('hotel'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Hotel $hotel)
    {
        $request->validate([
            'id_jenis_hotel' => 'required',
            'nama_hotel' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'gambar_hotel' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',

        ]);

        $hotel->update([
            'id_hotel' => rand(),
            'id_jenis_hotel'  => $request->id_jenis_hotel,
            'nama_hotel' => $request->nama_hotel,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'gambar_hotel' => $request->gambar_hotel,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);
        return redirect("hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect("hotel")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $hotel = Hotel::join('tb_jenis_hotel', 'tb_jenis_hotel.id_jenis_hotel', 'tb_hotel.id_jenis_hotel')
        ->select('tb_hotel.*', 'tb_jenis_hotel.*')
        ->get();
        $pdf = Pdf::loadview('hotel\laporan-hotel', ['hotel' => $hotel])->setPaper('a4');
        return $pdf->download('laporan-hotel.pdf');
    }
}
