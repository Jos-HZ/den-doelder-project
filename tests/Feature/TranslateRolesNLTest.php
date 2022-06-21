<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TranslateRolesNLTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function LocalisationTest_admin_NL()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345'),
            'role' => 'admin',
            'language'=>'nl'
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
    public function LocalisationTest_production_NL()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345'),
            'role' => 'production',
            'language'=>'nl'
        ]);
        $response = $this->actingAs($user)->followingRedirects()->get('/language/nl/')->assertSee('Je bent ingelogd als productie');
        $response->assertStatus(200);

    }

    public function LocalisationTest_driver_NL()
    {
        $user = User::create([
            'name' => 'driver',
            'email' => 'driver@driver.com',
            'password' => bcrypt('driver12345'),
            'role' => 'driver',
            'language'=>'nl'
        ]);
        $response = $this->actingAs($user)->followingRedirects()->get('/language/nl/')->assertSee('U bent ingelogd als driver!');
        $response->assertStatus(200);
    }
}
