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
}
