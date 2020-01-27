<?php

namespace Tests\Unit;

use App\User;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_create_a_user() {
        $user = [
            'name' => 'Test User 1',
            'email' => 'TestUser1@test.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->post('/register', $user);

        $response->assertRedirect('/');

        array_splice($user, 2, 2);

        $this->assertDatabaseHas('users', $user);
    }

    public function test_user_can_view_a_login_form() {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_can_view_a_login_form_when_authenticated() {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('login');

        $response->assertRedirect('/');
    }

    public function test_user_can_login_with_correct_credentials() {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'password')
        ]);

        $response = $this->post('login', [
            'email' => $user->email,
            'password' => $password
        ]);

        $response->assertRedirect('/handleAuth');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_login_credentials() {
        $user = factory(User::class)->create([
            'password' => bcrypt('password')
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'incorrect-password'
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');

        // $this->assertTrue(session()->hasOldInput('email'));
        // $this->assertTrue(session()->hasOldInput('password'));

        $this->assertGuest();
    }

    public function test_remember_me_functionality() {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'password')
        ]);

        $response = $this->post('login', [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on'
        ]);

        $response->assertRedirect('/handleAuth');

        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->id,
            $user->getRememberToken(),
            $user->password
        ]));

        $this->assertAuthenticatedAs($user);
    }
}
