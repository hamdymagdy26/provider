<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProviderTest extends TestCase
{
    /**
     * Test the api success
     * GET /
    */
    public function test_get_providers()
    {
        $response = $this->get('api/v1/users');
        $response->assertStatus(200);
    }

    /**
     * Test number of providers if no provider selected
     * GET /
    */
    public function test_count_if_no_provider_selected()
    {
        $response = $this->get('api/v1/users');
        $this->assertCount(10, $response['data']);
    }

    /**
     * Test number of providers if provider x selected
     * GET /
    */
    public function test_count_if_provider_selected()
    {
        $response = $this->get('api/v1/users?provider=DataProviderX');
        $this->assertCount(5, $response['data']);
    }

    /**
     * Test number of providers if provider x selected
     * GET /
    */
    public function test_count_if_provider_and_currency_selected()
    {
        $response = $this->get('api/v1/users?provider=DataProviderX&currency=USD');
        $this->assertCount(4, $response['data']);
    }

    /**
     * Test number of providers if provider x selected
     * GET /
    */
    public function test_count_if_provider_and_currency_and_status_selected()
    {
        $response = $this->get('api/v1/users?provider=DataProviderX&currency=USD&statusCode=autorised');
        $this->assertCount(1, $response['data']);
    }

    /**
     * Test number of providers if provider x selected
     * GET /
    */
    public function test_if_integer_currency_passed()
    {
        $response = $this->get('api/v1/users?currency=10');
        $response->assertStatus(403);
    }
}
