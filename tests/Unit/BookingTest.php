<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_booking()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/bookings', [
            'product_id' => $product->id,
            'booking_date' => now()->addDays(2)->format('Y-m-d'),
            'notes' => 'Test Booking Notes',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('bookings', [
            'product_id' => $product->id,
            'user_id' => $user->id,
        ]);
    }
}
