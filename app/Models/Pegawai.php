<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawais";

    public function transaksi(): HasMany {
        return $this->hasMany(Transaksi::class, "pegawais_id", "id");
    }
}
