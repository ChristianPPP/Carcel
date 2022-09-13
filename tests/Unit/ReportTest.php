<?php

namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;

class ReportTest extends TestCase
{
    public function test_report_index_if_user_is_authenticate (){
        $user=User::factory()->make(['role_id'=>3]);
        $test_request = $this->actingAs($user)->get('/api/v1/report');
        $test_request->assertStatus(200);
    }
    public function test_report_store_if_user_is_authenticate(){
        $user_report=User::factory()->create(['role_id'=>3]);
        $reports=[
            "title" => "Development software",
            "description" =>"This book is for type developers frontend"
        ];
        $test_request = $this->actingAs($user_report)->post('/api/v1/report/create',$reports);
        $test_request->assertStatus(200);
    }
    public function test_report_show_if_user_is_authenticate (){
        $user=User::where('id', 221)->first();
        $test_request = $this->actingAs($user)->get(sprintf('/api/v1/report/%u',3));
        $test_request->assertStatus(200);
    }
    public function test_report_update_if_user_is_authenticate(){
        $user=User::where('id', 221)->first();
        $reports=[
            "title" => "Development software",
            "description" =>"This book is for type developers frontend"
        ];
            $test_request = $this->actingAs($user)->post(sprintf('/api/v1/report/%u/update',3),$reports);
        $test_request->assertStatus(200);
    }
    public function test_report_destroy_if_user_is_authenticate (){
        $user=User::where('id', 221)->first();
        $test_request = $this->actingAs($user)->get(sprintf('/api/v1/report/%u/destroy',3));
        $test_request->assertStatus(200);
    }
}
