<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
        ]);

        Account::factory()
            ->bank()
            ->for($user)
            ->has(Transaction::factory()->count(10)->january())
            ->has(Transaction::factory()->count(10)->february())
            ->has(Transaction::factory()->count(10)->march())
            ->has(Transaction::factory()->count(10)->april())
            ->has(Transaction::factory()->count(10)->may())
            ->has(Transaction::factory()->count(10)->june())
            ->has(Transaction::factory()->count(10)->july())
            ->has(Transaction::factory()->count(10)->august())
            ->create();

        Account::factory()
            ->ewallet()
            ->for($user)
            ->has(Transaction::factory()->count(10)->january())
            ->has(Transaction::factory()->count(10)->february())
            ->has(Transaction::factory()->count(10)->march())
            ->has(Transaction::factory()->count(10)->april())
            ->has(Transaction::factory()->count(10)->may())
            ->has(Transaction::factory()->count(10)->june())
            ->has(Transaction::factory()->count(10)->july())
            ->has(Transaction::factory()->count(10)->august())
            ->create();

        Account::factory()
            ->investment()
            ->for($user)
            ->has(Transaction::factory()->count(10)->january())
            ->has(Transaction::factory()->count(10)->february())
            ->has(Transaction::factory()->count(10)->march())
            ->has(Transaction::factory()->count(10)->april())
            ->has(Transaction::factory()->count(10)->may())
            ->has(Transaction::factory()->count(10)->june())
            ->has(Transaction::factory()->count(10)->july())
            ->has(Transaction::factory()->count(10)->august())
            ->create();

        Account::factory()
            ->loan()
            ->for($user)
            ->has(Transaction::factory()->count(10)->january())
            ->has(Transaction::factory()->count(10)->february())
            ->has(Transaction::factory()->count(10)->march())
            ->has(Transaction::factory()->count(10)->april())
            ->has(Transaction::factory()->count(10)->may())
            ->has(Transaction::factory()->count(10)->june())
            ->has(Transaction::factory()->count(10)->july())
            ->has(Transaction::factory()->count(10)->august())
            ->create();

        Account::factory()
            ->other()
            ->for($user)
            ->has(Transaction::factory()->count(10)->january())
            ->has(Transaction::factory()->count(10)->february())
            ->has(Transaction::factory()->count(10)->march())
            ->has(Transaction::factory()->count(10)->april())
            ->has(Transaction::factory()->count(10)->may())
            ->has(Transaction::factory()->count(10)->june())
            ->has(Transaction::factory()->count(10)->july())
            ->has(Transaction::factory()->count(10)->august())
            ->create();
    }
}
