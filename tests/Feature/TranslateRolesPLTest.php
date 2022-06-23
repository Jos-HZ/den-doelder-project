<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TranslateRolesPLTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function LocalisationTest_admin_PL()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345'),
            'role' => 'admin',
            'language' => 'pl'
        ]);
        $response = $this->actingAs($user)->followingRedirects()->get('/language/pl/')->assertSee('Jesteś zalogowany jako administrator!');
        $response->assertStatus(200);

    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function LocalisationTest_production_PL()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response = $this->actingAs($user)->followingRedirects()->get('/language/pl/')->assertSee('Jesteś zalogowany jako producent!');
        $response->assertStatus(200);

    }

    public function LocalisationTest_driver_PL()
    {
        $user = User::create([
            'name' => 'driver',
            'email' => 'driver@driver.com',
            'password' => bcrypt('driver12345'),
            'role' => 'driver',
            'language' => 'pl'
        ]);
        $response = $this->actingAs($user)->followingRedirects()->get('/language/pl/')->assertSee('Jesteś zalogowany jako kierowca!');
        $response->assertStatus(200);
    }
}
