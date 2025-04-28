<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('venue.jpg');

        $response = $this->post('/products', [
            'title2' => 'Test Venue',
            'description2' => 'Test Venue Description',
            'imageUpload2' => $file,
            'contact' => '1234567890',
            'packege' => ['Standard', 'Premium'],
            'amenity' => ['WiFi', 'Parking'],
            'location' => 'Test Location',
            'latitude' => 12.34,
            'longitude' => 56.78,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('products', [
            'title2' => 'Test Venue'
        ]);
    }
}
