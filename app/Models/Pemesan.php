<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    use HasFactory;
    protected $table = "tb_pemesan";
    protected $primaryKey = 'id_pemesan';
    protected $fillable = ['id_pemesan','id_hotel','id_kamar','id_tempat_wisata','id_objek_atraksi','id_pengguna','alamat','no_telp','total_harga','metode_pembayaran','tgl_pesan'];
    public $timestamps = false;
}
