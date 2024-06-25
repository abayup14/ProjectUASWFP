<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = "pelanggans";
    public $timestamps = false;

    public function transaksi(): HasMany {
        return $this->hasMany(Transaksi::class, "pegawais_id", "id");
    }
}
