<?php

namespace Database\Factories;

use App\Constants\AccountType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(3, true),
            'type' => fake()->randomElement([
                AccountType::BANK,
                AccountType::CASH,
                AccountType::CHECKING,
                AccountType::CREDIT,
                AccountType::EWALLET,
                AccountType::INVESTMENT,
                AccountType::LOAN,
                AccountType::OTHER,
                AccountType::SAVINGS,
            ]),
            'description' => fake()->text,
            'user_id' => User::factory(),
            'created_at' => fake()->dateTimeThisYear(),
        ];
    }

    public function bank()
    {
        return $this->state([
            'type' => AccountType::BANK,
        ]);
    }

    public function ewallet()
    {
        return $this->state([
            'type' => AccountType::EWALLET,
        ]);
    }

    public function investment()
    {
        return $this->state([
            'type' => AccountType::INVESTMENT,
        ]);
    }

    public function loan()
    {
        return $this->state([
            'type' => AccountType::LOAN,
        ]);
    }

    public function other()
    {
        return $this->state([
            'type' => AccountType::OTHER,
        ]);
    }
}
