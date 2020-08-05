<?php declare(strict_types=1);

namespace Tests\Feature;

use App\User;
use App\WarehouseItem;
use Tests\TestCase;

class WarehouseItemTest extends TestCase
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

    public function testGetWarehouseItems()
    {
        $response = $this->get('/api/v1/warehouse/index');
        $response->assertJsonCount(25, 'data');
    }

    public function testCreateNewWarehouseItem()
    {
        $newItem = factory(WarehouseItem::class)->create([
            'name' => 'Item1'
        ]);

        $item = $this->get('api/v1/warehouse/show?itemId=' . $newItem->id);

        $item->assertOk();
        $item->assertJsonFragment(['id' => 101]);
        $item->assertJsonFragment(['name' => 'Item1']);
    }
}
