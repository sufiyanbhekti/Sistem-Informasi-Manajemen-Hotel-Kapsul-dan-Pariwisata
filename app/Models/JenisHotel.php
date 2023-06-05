<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisHotel extends Model
{
    use HasFactory;
    protected $table = "tb_jenis_hotel";
    protected $primaryKey = 'id_jenis_hotel';
    protected $fillable = ['id_jenis_hotel','nama_jenis_hotel','deskripsi'];
    public $timestamps = false;
}
