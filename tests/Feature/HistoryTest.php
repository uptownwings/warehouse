<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class HistoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed');
        $this->doLogin();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function doLogin()
    {
        $this->post('/api/v1/auth/login', [
            'email' => 'admin@admin.com',
            'password' => 'secret123'
        ]);
    }

    public function testGetPriceHistory()
    {
        $this->get('api/v1/warehouse/pricehistory/item?itemId=1')->assertOk();
    }

    public function testGetQuantityHistory()
    {
        $this->get('api/v1/warehouse/quantityhistory/item?itemId=1')->assertOk();
    }
}
