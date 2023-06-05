<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Hotel;
use App\Models\JenisHotel;
use App\Models\Kamar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = Kamar::join('tb_hotel', 'tb_hotel.id_hotel', 'tb_kamar.id_hotel')
        ->join('tb_fasilitas', 'tb_fasilitas.id_fasilitas', 'tb_kamar.id_fasilitas')
        ->select('tb_kamar.*','tb_fasilitas.*','tb_hotel.*')
        ->paginate(10);
        return view('kamar/kamar', compact('kamar'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fasilitas'] = Fasilitas::all();
        $data ['hotel'] = Hotel::all();
        return view('kamar/tambah-kamar',$data);
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
            'id_fasilitas' => 'required',
            'jenis_kamar' => 'required',
            'status_kamar' => 'required',
            'harga_kamar' => 'required',
        ]);

        Kamar::create([
            'id_kamar' => rand(),
            'id_hotel'  => $request->id_hotel,
            'id_fasilitas' => $request->id_fasilitas,
            'jenis_kamar' => $request->jenis_kamar,
            'status_kamar' => $request->status_kamar,
            'harga_kamar' => $request->harga_kamar,
        ]);
        return redirect("kamar")->with("message", "Data berhasil disimpan");
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
    public function edit(Kamar $kamar)
    {
        $data ['kamar'] = Kamar::all();
        $data ['hotel'] = Hotel::all();
        $data['fasilitas'] = Fasilitas::all();
        return view('kamar.edit-kamar',compact('kamar'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Kamar $kamar)
    {
        $request->validate([
            'id_hotel' => 'required',
            'id_fasilitas' => 'required',
            'jenis_kamar' => 'required',
            'status_kamar' => 'required',
            'harga_kamar' => 'required',
        ]);

        $kamar->update([
            'id_kamar' => rand(),
            'id_hotel'  => $request->id_hotel,
            'id_fasilitas' => $request->id_fasilitas,
            'jenis_kamar' => $request->jenis_kamar,
            'status_kamar' => $request->status_kamar,
            'harga_kamar' => $request->harga_kamar,
        ]);
        return redirect("kamar")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect("kamar")->with("message", "Data berhasil disimpan");
    }
    public function print()
    {
        $kamar = Kamar::join('tb_hotel', 'tb_hotel.id_hotel', 'tb_kamar.id_hotel')
        ->join('tb_fasilitas', 'tb_fasilitas.id_fasilitas', 'tb_kamar.id_fasilitas')
        ->select('tb_kamar.*','tb_fasilitas.*','tb_hotel.*')
        ->get();
        $pdf = Pdf::loadview('kamar\laporan-kamar', ['kamar' => $kamar])->setPaper('a4');
        return $pdf->download('laporan-kamar.pdf');
    }
}
