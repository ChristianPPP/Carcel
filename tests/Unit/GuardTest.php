<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class GuardTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_guard_index_if_user_is_authenticate (){
        $user=User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user)->get('/api/v1/guard/');
        $test_request->assertStatus(200);

    }
    public function test_guard_store_if_user_is_authenticate(){
        //$user=User::factory()->make(['role_id'=>3]);
        $user_guard=User::factory()->make(['role_id'=>1]);
        
        $user_guard1=[
            "username" => Str::random(10),
            "full_name" => "Marciano",
            "first_name" => "Jarrette",
            "last_name" => "Braz",
            "email" => sprintf("marciano%s@example.org",Str::random(14)),
            "role" => "guard",
            "birthdate" => "2009-11-08",
            "home_phone" => "023844017",
            "personal_phone" => "0978936885",
            "address" => "7989 Hills Ports"
        ];
        $test_request = $this->actingAs($user_guard)->post('/api/v1/guard/create',$user_guard1);
        //$test_request = $this->actingAs($user)->get('/api/v1/guard/',$user_guard);
        $test_request->assertStatus(200);


    }
    public function test_guard_show_if_user_is_authenticate (){
        $user=User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user)->get(sprintf('/api/v1/guard/%u',13));
        $test_request->assertStatus(200);
    }
    
    public function test_guard_update_if_user_is_authenticate(){
        //$user=User::factory()->make(['role_id'=>3]);
        $user_guard=User::factory()->make(['role_id'=>1]);
        
        $user_guard1=[
            "username" => Str::random(10),
            "full_name" => "Joaquin",
            "first_name" => "Jarrette",
            "last_name" => "Braz",
            "email" => sprintf("joaquin%s@example.org",Str::random(14)),
            "role" => "guard",
            "birthdate" => "2009-11-08",
            "home_phone" => "023844019",
            "personal_phone" => "0978936899",
            "address" => "7989 Hills Ports"
        ];
        $test_request = $this->actingAs($user_guard)->post(sprintf('/api/v1/guard/%u/update',14), $user_guard1);
        //$test_request = $this->actingAs($user)->get('/api/v1/guard/',$user_guard);
        $test_request->assertStatus(200);


    }
    public function test_guard_destroy_if_user_is_authenticate(){
        $user=User::factory()->make(['role_id'=>1]);
        $test_request = $this->actingAs($user)->get(sprintf('/api/v1/guard/%u/destroy',11));
        $test_request->assertStatus(200);
    
}
}
