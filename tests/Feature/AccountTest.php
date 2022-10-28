<?php

use App\Models\User;
use App\Models\Account;
use App\Constants\AccountType;

it('can get all accounts', function () {
    $user = User::factory()->hasAccounts(3)->create();
    $this->actingAs($user)
        ->getJson("/api/accounts")
        ->assertOk()
        ->assertJsonCount(3);
});

it('can get account by id', function () {
    $user = User::factory()->create();
    $account = Account::factory()->for($user)->create();
    $this
        ->actingAs($user)
        ->getJson("/api/accounts/{$account->id}")
        ->assertOk()
        ->assertJsonFragment([
            'id' => $account->id,
            'name' => $account->name,
            'type' => $account->type,
            'description' => $account->description,
        ]);
});

it('can create account', function () {
    $user = User::factory()->create();
    $account = Account::factory()->for($user)->makeOne();

    $this->actingAs($user)
        ->postJson("/api/accounts", $account->toArray())
        ->assertCreated()
        ->assertJsonFragment([
            'name' => $account->name,
            'type' => $account->type,
            'description' => $account->description,
        ]);

    $this->assertDatabaseHas(Account::class, $account->toArray());
});

it('can update account', function () {
    $user = User::factory()->create();
    $account = Account::factory()->ewallet()->create();
    $account->name = 'Mandiri';
    $account->type = AccountType::BANK;
    $account->description = 'New Description';

    $this->actingAs($user)
        ->putJson("/api/accounts/{$account->id}", $account->toArray())
        ->assertOk()
        ->assertJsonFragment([
            'name' => $account->name,
            'type' => $account->type,
            'description' => $account->description,
        ]);

    $this->assertDatabaseHas(Account::class, $account->toArray());
});


