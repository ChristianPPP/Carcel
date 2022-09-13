<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class ProfileTest extends TestCase
{
    public function test_profile_show_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user_auth)->get('/api/v1/profile/');
        $test_request->assertStatus(200);
    }

    public function test_profile_store_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $profile = [
            "username" => Str::random(10),
            "first_name" => "Jarretta",
            "last_name" => "Brazukaa",
            "birthdate" => "2003-09-07",
            "home_phone" => "026283474",
            "personal_phone" => "0989162443",
            "address" => "49447 Frida Dam Suite 92d"
        ];
        $test_request = $this->actingAs($user_auth)->post('/api/v1/profile/', $profile);
        $test_request->assertStatus(200);
    }
}
