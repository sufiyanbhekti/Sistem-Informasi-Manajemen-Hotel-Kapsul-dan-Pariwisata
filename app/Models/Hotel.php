<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = "tb_hotel";
    protected $primaryKey = 'id_hotel';
    protected $fillable = ['id_hotel','id_jenis_hotel','nama_hotel','alamat','deskripsi','gambar_hotel','check_in','check_out'];
    public $timestamps = false;
}

