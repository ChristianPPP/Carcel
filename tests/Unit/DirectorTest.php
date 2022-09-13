<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class DirectorTest extends TestCase
{
    public function test_director_index_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user_auth)->get('/api/v1/director/');
        $test_request->assertStatus(200);
    }

    public function test_director_store_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $user_director = [
            "username" => Str::random(10),
            "full_name" => "Jennifer Brakusa",
            "first_name" => "Jarrett",
            "last_name" => "Brazuka",
            "email" => sprintf("lennylf.croos%sksa@example.org",Str::random(14)),
            "role" => "director",
            "birthdate" => "2010-09-07",
            "home_phone" => "026283475",
            "personal_phone" => "0989162443",
            "address" => "49447 Frida Dam Suite 929"
        ];
        $test_request = $this->actingAs($user_auth)->post('/api/v1/director/create', $user_director);
        $test_request->assertStatus(200);
    }

    public function test_director_show_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user_auth)->get(sprintf('/api/v1/director/%u', 6));
        $test_request->assertStatus(200);
    }

    public function test_director_update_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $user_director = [
            "username" => Str::random(10),
            "full_name" => "Jennifer Brakusa",
            "first_name" => "Jarretta",
            "last_name" => "Brazukaa",
            "email" => sprintf("lenny.crolo%sksa@example.org",Str::random(14)),
            "role" => "director",
            "birthdate" => "2010-09-07",
            "home_phone" => "026283474",
            "personal_phone" => "0989162443",
            "address" => "49447 Frida Dam Suite 92d"
        ];
        $test_request = $this->actingAs($user_auth)->post(sprintf('/api/v1/director/%u/update', 7), $user_director);
        $test_request->assertStatus(200);
    }

    public function test_director_destroy_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user_auth)->get(sprintf('/api/v1/director/%u/destroy', 6));
        $test_request->assertStatus(200);
    }
}
