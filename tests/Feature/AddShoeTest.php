<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Shoe;

class AddShoeTest extends TestCase
{
    public function test_can_add_shoe(): void
    {
        $this->artisan('migrate:refresh --seed');

        $shoeData = [
            'shoeName' => 'Test Shoe',
            'shoeSize' => 42,
            'shoeImage' => 'iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII',
        ];

        $response = $this->post(route('shoe.store'), $shoeData);

        $response->assertStatus(302);

    }
}
