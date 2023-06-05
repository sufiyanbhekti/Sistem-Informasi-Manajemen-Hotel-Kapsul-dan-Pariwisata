<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekAtraksi extends Model
{
    use HasFactory;
    protected $table = "tb_objek_atraksi";
    protected $primaryKey = 'id_objek_atraksi';
    protected $fillable = ['id_objek_atraksi','id_tempat_wisata','nama','tipe_atraksi','kapasitas_atraksi'];
    public $timestamps = false;
}
