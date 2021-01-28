<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOauthPassport() {
    
        $params = [
            'grant_type' => 'password',
            'client_id' => 2,
            'client_secret' => '91NRyweAzmMJ86BkqGHm3AevULmuEfGVz8kMUk39',
            'username' => 'admin@boxdelivery.com',
            'password' => 'boxdelivery',
            'scope' => '*'
        ];

        $this->json('POST','/oauth/token',$params,['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token_type','expires_in','access_token','refresh_token']);

    }
}
