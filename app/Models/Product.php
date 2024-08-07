<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotels_id');
    }

    public function fasilitas(): HasMany
    {
        return $this->hasMany(Fasilitas::class, "products_id", "id");
    }

    public function tipe_products(): BelongsTo
    {
        return $this->belongsTo(TipeProduct::class, "tipe_products_id");
    }
    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'product_transaksi', 'products_id', 'transaksis_id')
            ->withPivot('quantity', 'sub_total');
    }
}
