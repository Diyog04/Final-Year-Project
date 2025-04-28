<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title2',
        'description2',
        'image2',
        'contact',
        'packege',
        'amenity',
        'location',
        'latitude',   
    'longitude',

    ];
    protected $casts = [
        'packege' => 'array',
        'amenity' => 'array',
    ];

    public function bookings()
{
    return $this->hasMany(Booking::class);
}

public function images()
{
    return $this->hasMany(VenueImage::class, 'venue_id');
}
}
