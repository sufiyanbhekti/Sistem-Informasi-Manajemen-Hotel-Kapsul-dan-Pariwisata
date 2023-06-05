<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kamar;
use App\Models\ObjekAtraksi;
use App\Models\Pemesan;
use App\Models\Pengguna;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PemesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesan = Pemesan::join('tb_hotel', 'tb_hotel.id_hotel', 'tb_pemesan.id_hotel')
        ->join('tb_kamar', 'tb_kamar.id_kamar', 'tb_pemesan.id_kamar')
        ->join('tb_tempat_wisata', 'tb_tempat_wisata.id_tempat_wisata', 'tb_pemesan.id_tempat_wisata')
        ->join('tb_objek_atraksi', 'tb_objek_atraksi.id_objek_atraksi', 'tb_pemesan.id_objek_atraksi')
        ->join('tb_pengguna', 'tb_pengguna.id_pengguna', 'tb_pemesan.id_pengguna')
        ->select('tb_pemesan.*','tb_hotel.*','tb_kamar.*','tb_tempat_wisata.*','tb_objek_atraksi.*','tb_pengguna.*')
        ->paginate(10);
        return view('pemesan/pemesan', compact('pemesan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['hotel'] = Hotel::all();
        $data['kamar'] = Kamar::all();
        $data['tempatwisata'] = TempatWisata::all();
        $data['objekatraksi'] = ObjekAtraksi::all();
        $data['pengguna'] = Pengguna::all();
        return view('pemesan/tambah-pemesan',$data);
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
            'id_kamar' => 'required',
            'id_tempat_wisata' => 'required',
            'id_objek_atraksi' => 'required',
            'id_pengguna' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'total_harga' => 'required',
            'metode_pembayaran' => 'required',
            'tgl_pesan' => 'required',
        ]);

        Pemesan::create([
            'id_pemesan' => rand(),
            'id_hotel' => $request->id_hotel,
            'id_kamar' => $request->id_kamar,
            'id_tempat_wisata' => $request->id_tempat_wisata,
            'id_objek_atraksi' => $request->id_objek_atraksi,
            'id_pengguna' => $request->id_pengguna,
            'alamat'  => $request->alamat,
            'no_telp' => $request->no_telp,
            'total_harga' => $request->total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tgl_pesan' => $request->tgl_pesan,
        ]);
        return redirect("pemesan")->with("message", "Data berhasil disimpan");
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
    public function edit(Pemesan $pemesan)
    {
        $data ['pemesan'] = Pemesan::all();
        $data['hotel'] = Hotel::all();
        $data['kamar'] = Kamar::all();
        $data['tempatwisata'] = TempatWisata::all();
        $data['objekatraksi'] = ObjekAtraksi::all();
        $data['pengguna'] = Pengguna::all();
        return view('pemesan/edit-pemesan', compact('pemesan'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pemesan $pemesan)
    {
        $request->validate([
            'id_hotel' => 'required',
            'id_kamar' => 'required',
            'id_tempat_wisata' => 'required',
            'id_objek_atraksi' => 'required',
            'id_pengguna' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'total_harga' => 'required',
            'metode_pembayaran' => 'required',
            'tgl_pesan' => 'required',
        ]);

        $pemesan->update([
            'id_pemesan' => rand(),
            'id_hotel' => $request->id_hotel,
            'id_kamar' => $request->id_kamar,
            'id_tempat_wisata' => $request->id_tempat_wisata,
            'id_objek_atraksi' => $request->id_objek_atraksi,
            'id_pengguna' => $request->id_pengguna,
            'alamat'  => $request->alamat,
            'no_telp' => $request->no_telp,
            'total_harga' => $request->total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tgl_pesan' => $request->tgl_pesan,
        ]);
        return redirect("pemesan")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesan $pemesan)
    {
        $pemesan->delete();
        return redirect("pemesan")->with("message", "Data berhasil dihapus");
    }
    public function print()
    {
        $pemesan = Pemesan::join('tb_hotel', 'tb_hotel.id_hotel', 'tb_pemesan.id_hotel')
        ->join('tb_kamar', 'tb_kamar.id_kamar', 'tb_pemesan.id_kamar')
        ->join('tb_tempat_wisata', 'tb_tempat_wisata.id_tempat_wisata', 'tb_pemesan.id_tempat_wisata')
        ->join('tb_objek_atraksi', 'tb_objek_atraksi.id_objek_atraksi', 'tb_pemesan.id_objek_atraksi')
        ->join('tb_pengguna', 'tb_pengguna.id_pengguna', 'tb_pemesan.id_pengguna')
        ->select('tb_pemesan.*','tb_hotel.*','tb_kamar.*','tb_tempat_wisata.*','tb_objek_atraksi.*','tb_pengguna.*')
        ->get();
        $pdf = Pdf::loadview('pemesan\laporan-pemesan', ['pemesan' => $pemesan])->setPaper('a4');
        return $pdf->download('laporan-pemesan.pdf');
    }
}
