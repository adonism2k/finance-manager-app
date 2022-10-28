<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserInterface
{
    public function create(array $data);
    public function getUserAccounts(User $user);
    public function getUserTransactionSummary(User $user, $period, $filter_period);
    public function userDailyTransactionSummary(User $user, $filterByDate);
    public function userMonthlyTransactionSummary(User $user, $filterByMonth);
    public function userYearlyTransactionSummary(User $user, $filterByYear);
}
