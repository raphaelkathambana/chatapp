<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * @test
     */
    public function login_user_cannot_access_home_unless_verified()
    {
        $user = User::factory()->unverified()->make();
        $this->actingAs($user);
        $this->get('/home')->assertRedirect('/email/verify');
    }

    /**
     * @test
     */
    public function login_user_can_access_home_if_verified()
    {
        $user = User::factory()->make();
        $this->actingAs($user);
        $this->get('')->assertStatus(200);
    }
}
