<?php

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;

it('can get all transaction', function () {
    $user = User::factory()->create();
    $account = Account::factory()->for($user)->create();
    Transaction::factory()->for($account)->count(3)->now()->create();

    $this->actingAs($user)
        ->getJson('/api/transactions')
        ->assertOk()
        ->assertJsonCount(3);
});

it('can get transaction by id', function () {
    $user = User::factory()->create();
    $account = Account::factory()->for($user)->create();
    $transaction = Transaction::factory()->for($account)->now()->create();

    $this->actingAs($user)
        ->getJson("/api/transactions/{$transaction->id}")
        ->assertOk();
});

it('can create transaction', function () {
    $user = User::factory()->create();
    $account = Account::factory()->for($user)->create();

    $data = [
        'name' => 'Test Transaction',
        'amount' => 100000,
        'description' => 'Test Transaction Description',
        'account_id' => $account->id,
    ];

    $this->actingAs($user)
        ->postJson('/api/transactions', $data)
        ->assertCreated();
});

it('can update transaction', function () {
    $user = User::factory()->create();
    $account = Account::factory()->for($user)->create();
    $transaction = Transaction::factory()->for($account)->now()->create();

    $data = [
        'name' => 'Test Transaction',
        'amount' => 1000,
        'description' => 'Test Transaction Description',
        'account_id' => $account->id,
    ];

    $this->actingAs($user)
        ->putJson("/api/transactions/{$transaction->id}", $data)
        ->assertOk();
});

it('can delete transaction', function () {
    $user = User::factory()->create();
    $account = Account::factory()->for($user)->create();
    $transaction = Transaction::factory()->for($account)->now()->create();

    $this->actingAs($user)
        ->deleteJson("/api/transactions/{$transaction->id}")
        ->assertNoContent();
});
