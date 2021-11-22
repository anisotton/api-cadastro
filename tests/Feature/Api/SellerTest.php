<?php

namespace Tests\Feature\Api;

use App\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellerTest extends TestCase
{

    protected $endpoint = '/api/seller';
    /**
     * Get all sellers
     *
     * @return void
     */
    public function test_list_sellers()
    {
        Seller::factory()->count(5)->create();

        $response = $this->getJson("{$this->endpoint}");

        $response->assertJsonCount(5, 'data');

        $response->assertStatus(200);
    }

    /**
     * Error get single seller
     *
     * @return void
     */
    public function test_error_get_single_seller()
    {
        $response = $this->getJson("{$this->endpoint}/5");

        $response->assertStatus(404);
    }

    /**
     * Get single seller
     *
     * @return void
     */
    public function test_get_single_seller()
    {
        Seller::factory()->create();

        $response = $this->getJson("{$this->endpoint}/1");

        $response->assertStatus(200);
    }


    /**
     * Validation store seller
     *
     * @return void
     */
    public function test_validation_store_seller()
    {
        $response = $this->postJson("{$this->endpoint}",[
            'nome'=>'',
            'email'=>'',
        ]);

        $response->assertStatus(422);
    }
}
