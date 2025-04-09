<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Models\Booking;

class BookingStatusUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    public $booking;
    public $oldStatus;

    public function __construct(Booking $booking, $oldStatus)
    {
        $this->booking = $booking;
        $this->oldStatus = $oldStatus;
    }

    public function via($notifiable)
    {
        return ['database'];  // This means the notification will be stored in the database
    }

    public function toArray($notifiable)
    {
        return [
            'customer_id' => $this->booking->customer_id,  // Assuming 'user_id' is a field in the Booking model
            'booking_id' => $this->booking->id,
            'product_name' => $this->booking->product->title2,  // Assuming 'product' is related to 'Booking'
            'message' => $this->getStatusMessage(),
            'status' => $this->booking->status,
            'old_status' => $this->oldStatus,
            'url' => route('bookings.show', $this->booking->id),
        ];
    }

    protected function getStatusMessage()
    {
        return match($this->booking->status) {
            'confirmed' => "Your booking for {$this->booking->product->title2} has been confirmed!",
            'cancelled' => "Your booking for {$this->booking->product->title2} has been cancelled",
            default => "Your booking status has been updated."
        };
    }
}

