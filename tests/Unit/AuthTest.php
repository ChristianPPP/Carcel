<?php

namespace Tests\Unit;

use Tests\TestCase;


class AuthTest extends TestCase
{
    public function test_login_if_credentials_are_correct()
    {
        $test_request = $this->post('/api/v1/login', [
            "email" => "kwillms@example.org",
            "password" => "secret"
        ]);
        $test_request->assertStatus(200);
    }
    public function test_login_if_credentials_are_incorrect()
    {
        $test_request = $this->post('/api/v1/login', [
            "email" => "domenica.friesen@example.net",
            "password" => "secret"
        ]);
        $test_request->assertNotFound();
    }
    public function test_logout()
    {
        $test_request = $this->post('/api/v1/logout');
        $test_request->assertStatus(302);
    }
}

