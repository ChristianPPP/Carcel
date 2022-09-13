<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;

class PasswordTest extends TestCase
{
    public function test_forgot_password_whit_credentials()
    {
        $test_request = $this->post('/api/v1/forgot-password', [
            "email" => "kwillms@example.org"
        ]);
        $test_request->assertStatus(200);
        //dd($test_request);
    }
    public function test_update_password_whit_credentials()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user_auth)->post('/api/v1/forgot-password', [
            "email" => "kwillms@example.org",
            "password" => "nuevopwd",
            "confirm-password" => "nuevopwd"
        ]);
        //dd($test_request);
        $test_request->assertStatus(422);
    }
}
