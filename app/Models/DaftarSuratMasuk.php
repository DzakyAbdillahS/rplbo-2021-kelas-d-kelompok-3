<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarSuratMasuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_surat',
        'tanggal_surat',
        'asal_surat',
        'index_surat',
        'file_surat',
        'jumlah_lampiran'
    ];

    use HasFactory;
    public function disposisi_surats(){
        return $this->hasMany(DisposisiSuratMasuk::class,'suratmasuk_id');
    }
}
