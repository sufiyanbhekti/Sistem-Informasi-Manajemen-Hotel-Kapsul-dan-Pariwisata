<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    use HasFactory;
    protected $table = "tb_tempat_wisata";
    protected $primaryKey = 'id_tempat_wisata';
    protected $fillable = ['id_tempat_wisata','id_jenis_tempat_wisata','nama_tempat_wisata','alamat','deskripsi','jam_buka','jam_tutup','harga_tiket'];
    public $timestamps = false;
}
