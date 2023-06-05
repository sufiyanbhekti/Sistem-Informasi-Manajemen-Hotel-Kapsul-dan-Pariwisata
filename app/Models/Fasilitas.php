<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = "tb_fasilitas";
    protected $primaryKey = 'id_fasilitas';
    protected $fillable = ['id_fasilitas','jenis_fasilitas','nama_fasilitas','deskripsi'];
    public $timestamps = false;
}
