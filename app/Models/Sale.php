<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'quantity',
        'total_price',
        'sold_at',
    ];
    protected $casts = [
        'sold_at' => 'datetime', // Ensure sold_at is a Carbon instance
    ];

    // Define the relationship with the Item model
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
