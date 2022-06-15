<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TranslateRolesNLTest extends TestCase
{
//    use
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function LocalisationTest_admin()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345'),
            'role' => 'admin'
        ]);
        $response = $this->actingAs($user)->followingRedirects()->get('/language/nl/')->assertSee('U bent ingelogd als admin!');
        $response->assertStatus(200);

    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function LocalisationTest_production()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response = $this->actingAs($user)->followingRedirects()->get('/language/nl/')->assertSee('Je bent ingelogd als productie');
        $response->assertStatus(200);

    }

    public function LocalisationTest_driver()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345'),
            'role' => 'driver'
        ]);
        $response = $this->actingAs($user)->followingRedirects()->get('/language/nl/')->assertSee('U bent ingelogd als driver!');
        $response->assertStatus(200);
    }
}
