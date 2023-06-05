<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = "tb_pengguna";
    protected $primaryKey = 'id_pengguna';
    protected $fillable = ['id_pengguna','nama_pengguna','username','password','jabatan','no_telp'];
    public $timestamps = false;
}
