<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define fillable fields (if needed)
    protected $fillable = [
        'product_id',
        'total_price',
        'status',
    ];

    // Define relationships (if needed)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}