<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function login(): void
    {
        $response = $this->post('/api/login', [
            'email' => 'john.test@mail.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
    }

    public function failLogin(): void
    {
        $response = $this->post('/api/login', [
            'email' => 'john.test2@mail.com',
            'password' => 'password2',
        ]);

        $response->assertStatus(401);
    }

    public function logout(): void
    {
        $response = $this->post('/api/logout');

        $response->assertStatus(200);
    }
}
