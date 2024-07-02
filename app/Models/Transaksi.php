<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksis";
    public $timestamps = false;

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "pelanggans_id");
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_transaksi', 'transaksis_id', 'products_id')
            ->withPivot('quantity', 'sub_total');
    }
    public function insertProducts($cart)
    {
        foreach ($cart as $c) {
            $subtotal = $c['quantity'] * $c['harga'];
            $this->products()->attach($c['id'], ['quantity' => $c['quantity'], 'sub_total' => $subtotal]);
        }
    }
}
