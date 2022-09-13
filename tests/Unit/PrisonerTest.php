<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class PrisonerTest extends TestCase
{
    public function test_prisoner_index_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user_auth)->get('/api/v1/prisoner/');
        $test_request->assertStatus(200);
    }

    public function test_prisoner_store_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $user_prisoner = [
            "username" => Str::random(10),
            "full_name" => "Jennifer Brakusa",
            "first_name" => "Jarrett",
            "last_name" => "Brazuka",
            "email" => sprintf("lbennyd.croos%sksa@example.org",Str::random(14)),
            "role" => "prisoner",
            "birthdate" => "2010-09-07",
            "home_phone" => "026283475",
            "personal_phone" => "0989162443",
            "address" => "49447 Frida Dam Suite 929"
        ];
        $test_request = $this->actingAs($user_auth)->post('/api/v1/prisoner/create', $user_prisoner);
        $test_request->assertStatus(200);
    }

    public function test_prisoner_show_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user_auth)->get(sprintf('/api/v1/prisoner/%u', 18));
        $test_request->assertStatus(200);
    }

    public function test_prisoner_update_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $user_prisoner  = [
            "username" => Str::random(10),
            "full_name" => "Jennifer Brakusa",
            "first_name" => "Jarretta",
            "last_name" => "Brazukaa",
            "email" => sprintf("lennyd.crolo%sksa@example.org",Str::random(14)),
            "role" => "prisoner",
            "birthdate" => "2010-09-07",
            "home_phone" => "026283474",
            "personal_phone" => "0989162443",
            "address" => "49447 Frida Dam Suite 92d"
        ];
        $test_request = $this->actingAs($user_auth)->post(sprintf('/api/v1/prisoner/%u/update', 17), $user_prisoner);
        $test_request->assertStatus(200);
    }

    public function test_prisoner_destroy_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user_auth)->get(sprintf('/api/v1/prisoner/%u/destroy', 16));
        $test_request->assertStatus(200);
    }
}
