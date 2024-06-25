<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksis";

    public function pegawai(): BelongsTo {
        return $this->belongsTo(Pegawai::class, "pegawais_id");
    }

    public function pelanggan(): BelongsTo {
        return $this->belongsTo(Pelanggan::class, "pelanggans_id");
    }
}
