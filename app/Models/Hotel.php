<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    public $timestamps = false;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'hotels_id', 'id');
    }
    public function tipe_hotels(): BelongsTo {
        return $this->belongsTo(TipeHotel::class, "tipe_hotels_id");
    }
}
