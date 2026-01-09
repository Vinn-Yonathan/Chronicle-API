<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class OrderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('delete from orders');
        DB::delete('delete from products');
    }

    public function testOrderSuccess(): void
    {
        $this->seed([ProductSeeder::class]);
        $product = Product::first();
        Log::info($product);
        $response = $this->post('/api/orders', [
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        $response->assertStatus(201)->assertJson([
            'data' => [
                'product_id' => $product->id,
                'quantity' => 1,
                'total_price' => 5000
            ]
        ]);
    }
}
