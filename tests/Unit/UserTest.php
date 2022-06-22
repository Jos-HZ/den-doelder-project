<?php

namespace Tests\Unit;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function UserTest()
    {

        $user=[
            'name' => 'test',
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => '1234567sdcvrerfsdfgfrefds',
            'role' => 'production',
            'language'=> 'en'
        ];
        $this->validate($user, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role' => 'required',
            'language'=>'required|string'
        ]);
        $this->assertTrue(true);
    }

}
