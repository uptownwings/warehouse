<?php declare(strict_types=1);

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testWebsiteOnline()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLoginFunctionality()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'secret123'),
            'email' => 'test@test.com'
        ]);

        $response = $this->post('api/v1/auth/login', [
            'email' => $user->email,
            'password' => $password
        ])->assertStatus(200);

        $this->assertAuthenticatedAs($user);
    }
}
