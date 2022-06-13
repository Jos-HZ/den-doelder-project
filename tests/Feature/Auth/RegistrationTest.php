<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    // TODO: test that the user is created and that they can authenticate
//    public function test_new_users_can_register()
//    {
//        $this->withoutMiddleware();
//
//        $response = $this->post('/register', [
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//            'password' => 'password',
//            'password_confirmation' => 'password',
//            'email_verified_at' => now(),
//            'role' => 'production',
//        ]);
//
//        $this->assertAuthenticated();
//        $response->assertRedirect(RouteServiceProvider::HOME);
//    }
}
