<?php

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;

it('can fetch dashboard data', function () {
    $user = User::factory()->create();
    $account = Account::factory()->for($user)->create();
    Transaction::factory()->for($account)->now()->create();

    $this->actingAs($user)
        ->getJson('/api/dashboard')
        ->assertOk();
});
