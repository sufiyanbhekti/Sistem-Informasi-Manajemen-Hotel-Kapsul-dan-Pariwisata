<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaHotel extends Model
{
    use HasFactory;
    protected $table = "tb_kriteria_hotel";
    protected $primaryKey = 'id_kriteria_hotel';
    protected $fillable = ['id_kriteria_hotel','id_hotel','nama','rating','deskripsi'];
    public $timestamps = false;
}
