<?php

use App\Models\User;

test('user can register', function () {
    $data = [
        'name' => 'John Doe',
        'username' => 'JohnDoe',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $this->postJson('/api/register', $data)
        ->assertStatus(201)
        ->assertJsonFragment([
        ]);
});

test('registered user can login', function () {
    $user = User::factory()->create();

    $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ])
        ->assertStatus(200)
        ->assertJsonStructure([
            'token'
        ]);
});

test('auth user can be fetch', function () {
    $user = User::factory()->create();

    $this->actingAs($user, 'api')
        ->getJson('/api/user')
        ->assertStatus(200)
        ->assertJsonFragment([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
        ]);
});
