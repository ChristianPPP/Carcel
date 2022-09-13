<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class JailTest extends TestCase
{
    public function test_jail_index_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user_auth)->get('/api/v1/jail/');
        $test_request->assertStatus(200);
    }

    public function test_jail_store_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $jail = [
            'ward_id' => "2",
            'name' => sprintf("Leopoldo Turnpikeeee%s",Str::random(14)),
            'code' => "MR50673386205169375614507193",
            'type' => "medium",
            'capacity' => "5",
            'description' => "zzzzzzzzzzzzzzz",
        ];
        $test_request = $this->actingAs($user_auth)->post('/api/v1/jail/create', $jail);
        $test_request->assertStatus(200);
    }

    public function test_jail_show_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user_auth)->get(sprintf('/api/v1/jail/%u', 2));
        $test_request->assertStatus(200);
    }

    public function test_jail_update_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $jail  = [
            'ward_id' => "2",
            'name' => sprintf("Leopoldod Turnpikeeee%s",Str::random(14)),
            'code' => "MR50673386205169375614507193",
            'type' => "medium",
            'capacity' => "5",
            'description' => "zzzzzzzzzzzzzzz",
        ];
        $test_request = $this->actingAs($user_auth)->post(sprintf('/api/v1/jail/%u/update', 4), $jail);
        $test_request->assertStatus(200);
    }

    public function test_jail_destroy_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user_auth)->get(sprintf('/api/v1/jail/%u/destroy', 5));
        $test_request->assertStatus(200);
    }
}
