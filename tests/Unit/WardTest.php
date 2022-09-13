<?php

namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class WardTest extends TestCase
//DIRECTOR
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    public function test_ward_index_if_user_is_authenticate (){
        $user=User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user)->get('/api/v1/ward');
        $test_request->assertStatus(200);

    }
    public function test_ward_store_if_user_is_authenticate(){
        //$user=User::factory()->make(['role_id'=>3]);
        $user=User::factory()->make(['role_id'=>2]);
        
        $ward=[
            "id" => Str::random(10),
            "name" => "CR Nosotros",
            "location"=>"Ecuatoriana",
            "description" => "Menores de edad con delinos no agravados"
           
        ];
        $test_request = $this->actingAs($user)->post('/api/v1/ward/create',$ward);
        $test_request->assertStatus(200);
    }
    public function test_ward_show_if_user_is_authenticate (){
        $user=User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user)->get(sprintf('/api/v1/ward/%u',20));
        $test_request->assertStatus(200);
    }
    public function test_ward_update_if_user_is_authenticate(){
        //$user=User::factory()->make(['role_id'=>3]);
        $user=User::factory()->make(['role_id'=>2]);
        
        $ward=[
            "id" => Str::random(10),
            "name" => "CR Nosotros contra la delincuencia",
            "location"=>"San Bartolo",
            "description" => "Menores de edad con delinos no agravados"
        ];
        $test_request = $this->actingAs($user)->post(sprintf('/api/v1/ward/%u/update',20), $ward);
        $test_request->assertStatus(200);
    }
    public function test_ward_destroy_if_user_is_authenticate (){
        $user=User::factory()->make(['role_id'=>2]);
        $test_request = $this->actingAs($user)->get(sprintf('/api/v1/ward/%u/destroy',21));
        $test_request->assertStatus(200);

}
}