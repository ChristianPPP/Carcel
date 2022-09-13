<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;


class AssignmentTest extends TestCase
{
    public function test_assignment_index_guards_and_wards_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user_auth)->get('/api/v1/assignment/guards-and-wards');
        $test_request->assertStatus(200);
    }
    public function test_assigment_guard_to_ward_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user_auth)->get(sprintf('/api/v1/assignment/guard-to-ward/%u/%u', 31, 26));
        $test_request->assertStatus(200);
    }
    public function test_assignment_index_prisoners_and_jails_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user_auth)->get('/api/v1/assignment/prisoners-and-jails');
        $test_request->assertStatus(200);
    }
    public function test_assigment_prisoner_to_jail_if_user_is_authenticate()
    {
        $user_auth = User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user_auth)->get(sprintf('/api/v1/assignment/prisoner-to-jail/%u/%u', 39, 50));
        $test_request->assertStatus(200);
    }
}
