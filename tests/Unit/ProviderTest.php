<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    /**
     * Test the return if all providers
     * GET /
     */

    public function test_get_providers()
    {
        $response = $this->get('api/v1/users');
        dd($response);
        $response->assertJsonCount($expectedProducts->count(), '0');

    }
}
