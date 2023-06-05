<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTempatWisata extends Model
{
    use HasFactory;
    protected $table = "tb_jenis_tempat_wisata";
    protected $primaryKey = 'id_jenis_tempat_wisata';
    protected $fillable = ['id_jenis_tempat_wisata','nama_jenis_wisata','deskripsi'];
    public $timestamps = false;
}
