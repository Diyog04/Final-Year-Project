<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    public function test_payment_process()
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->actingAs($user);

        $response = $this->post('/payments', [
            'booking_id' => $booking->id,
            'amount' => 1000, // Assume 1000 is valid amount
            'payment_method' => 'credit_card',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('payments', [
            'booking_id' => $booking->id,
            'amount' => 1000,
        ]);
    }
}
