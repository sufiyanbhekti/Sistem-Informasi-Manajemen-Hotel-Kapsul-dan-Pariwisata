<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = "tb_penilaian";
    protected $primaryKey = 'id_penilaian';
    protected $fillable = ['id_penilaian','id_hotel','id_tempat_wisata','nilai','tanggapan','kategori','tgl_penilaian'];
    public $timestamps = false;
}
