<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification as Notification; // Use the built-in class
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatabaseNotification extends Notification
{
    use HasFactory;

    // The 'data' field is already available in the parent class DatabaseNotification
    // We don’t need to explicitly define it again

    protected $fillable = ['notifiable_id', 'notifiable_type', 'data', 'read_at'];

    /**
     * Define the relationship to the notifiable model (e.g., User, Booking)
     */
    public function notifiable()
    {
        return $this->morphTo();
    }
}
