<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
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
            'amount' => fake()->randomFloat(2, 0, 100000),
            'description' => fake()->text,
            'account_id' => Account::factory(),
            'created_at' => fake()->dateTimeThisYear(),
        ];
    }

    public function now()
    {
        return $this->state([
            'created_at' => now(),
        ]);
    }

    public function january()
    {
        return $this->state([
            'created_at' => fake()->dateTimeBetween('2022-01-01', '2022-01-31'),
        ]);
    }

    public function february()
    {
        return $this->state([
            'created_at' => fake()->dateTimeBetween('2022-02-01', '2022-02-28'),
        ]);
    }

    public function march()
    {
        return $this->state([
            'created_at' => fake()->dateTimeBetween('2022-03-01', '2022-03-31'),
        ]);
    }

    public function april()
    {
        return $this->state([
            'created_at' => fake()->dateTimeBetween('2022-04-01', '2022-04-30'),
        ]);
    }

    public function may()
    {
        return $this->state([
            'created_at' => fake()->dateTimeBetween('2022-05-01', '2022-05-31'),
        ]);
    }

    public function june()
    {
        return $this->state([
            'created_at' => fake()->dateTimeBetween('2022-06-01', '2022-06-30'),
        ]);
    }

    public function july()
    {
        return $this->state([
            'created_at' => fake()->dateTimeBetween('2022-07-01', '2022-07-31'),
        ]);
    }

    public function august()
    {
        return $this->state([
            'created_at' => fake()->dateTimeBetween('2022-08-01', '2022-08-31'),
        ]);
    }
}
