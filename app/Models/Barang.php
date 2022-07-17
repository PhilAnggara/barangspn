<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    // protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = ['id_barang','kategori_id','jenis_barang', 'nama_barang', 'kategori', 'deskripsi', 'kondisi_barang'];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }
}
