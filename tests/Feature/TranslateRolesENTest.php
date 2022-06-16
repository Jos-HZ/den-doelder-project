<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TranslateRolesENTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function LocalisationTest_admin_EN()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345'),
            'role' => 'admin'
        ]);
        $response = $this->actingAs($user)->followingRedirects()->get('/language/en/')->assertSee('You are logged in as admin!');
        $response->assertStatus(200);

    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function LocalisationTest_production_EN()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response = $this->actingAs($user)->followingRedirects()->get('/language/en/')->assertSee('You are logged in as production!');
        $response->assertStatus(200);

    }

    public function LocalisationTest_driver_EN()
    {
        $user = User::create([
            'name' => 'driver',
            'email' => 'driver@driver.com',
            'password' => bcrypt('driver12345'),
            'role' => 'driver'
        ]);
        $response = $this->actingAs($user)->followingRedirects()->get('/language/en/')->assertSee('You are logged in as driver!');
        $response->assertStatus(200);
    }
}
