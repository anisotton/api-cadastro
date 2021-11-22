<?php

namespace Tests\Feature\Api;

use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleTest extends TestCase
{
    protected $endpoint = '/api/sale';

    /**
     * Get all sales
     *
     * @return void
     */
    public function test_list_sales()
    {
        Sale::factory()->count(5)->create();

        $response = $this->getJson("{$this->endpoint}");

        $response->assertJsonCount(5, 'data');

        $response->assertStatus(200);
    }

    /**
     * Get empty sale
     *
     * @return void
     */
    public function test_empty_get_single_sale()
    {
        $response = $this->getJson("{$this->endpoint}/5");

        $response->assertStatus(200);
    }

    /**
     * Get single seller
     *
     * @return void
     */
    public function test_get_single_seller()
    {
        $seller = Seller::factory()->create();

        $data = [
            'seller_id' => $seller->id,
            'valor' => 1000,
        ];

        $response = $this->postJson("{$this->endpoint}", $data);
        $response->assertStatus(201);

        $response = $this->getJson("{$this->endpoint}/{$seller->id}");
        $response->assertStatus(200);
    }


    /**
     * Validation store sale
     *
     * @return void
     */
    public function test_validation_store_sale()
    {
        $response = $this->postJson("{$this->endpoint}",[
            'seller_id'=>'',
            'valor'=>'',
        ]);

        $response->assertStatus(422);
    }
}
