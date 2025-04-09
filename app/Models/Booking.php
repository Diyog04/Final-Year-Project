<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    // Define fillable fields (if needed)
    protected $fillable = [
        'customer_id',
        'product_id',
        'total_price',
        'status',
        'customer_name',
        'customer_email',
        'customer_phone',
        'payment_id',
    ];

    // Define relationships (if needed)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id'); // <-- specify custom FK
    }
    
}