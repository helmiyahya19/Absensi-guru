<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

        protected $table = 'divisions'; // Nama tabel, jika bukan 'divisions'
        protected $primaryKey = 'divisions_id'; // Ganti jika nama primary key berbeda
    
    
    // Jika kolom kunci utama bukan integer, tambahkan ini
    protected $keyType = 'string'; // Ubah jika tipe data kunci utama Anda berbeda

    public $timestamps = false; // Jika tabel tidak memiliki kolom created_at dan updated_at
}

