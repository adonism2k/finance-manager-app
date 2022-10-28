<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserInterface;
use Illuminate\Support\Collection;

class UserRepository implements UserInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function getUserAccounts(User $user)
    {
        return $user->accounts()->get();
    }

    public function getUserTransactionSummary(User $user, $period = null, $filter_period = null)
    {
        switch ($period) {
            case "daily":
                return $this->userDailyTransactionSummary($user, $filter_period);
            case "monthly":
                return $this->userMonthlyTransactionSummary($user, $filter_period);
            case "yearly":
                return $this->userYearlyTransactionSummary($user, $filter_period);
            default:
                return $this->userYearlyTransactionSummary($user, date("Y"));
        }
    }

    public function userDailyTransactionSummary(User $user, $filterByDate = null)
    {
        $summary = $user->transactions()
            ->whereDate('transactions.created_at', $filterByDate ?? date("Y-m-d"))
            ->get()
            ->groupBy(function ($transaction) {
                return $transaction->created_at->format('l');
            })->map(function ($transactions) {
                return ["sum_amount" => $transactions->sum('amount')];
            })->take(-7);

        $this->setHighest($summary);
        return $summary;
    }

    public function userMonthlyTransactionSummary(User $user, $filterByMonth = null)
    {
        $summary = $user->transactions()
            ->whereMonth('transactions.created_at', $filterByMonth ?? date("m"))
            ->get()
            ->groupBy(function ($transaction) {
                return $transaction->created_at->format('d');
            })->map(function ($transactions) {
                return ["sum_amount" => $transactions->sum('amount')];
            })->take(-7);

        $this->setHighest($summary);
        return $summary;
    }

    public function userYearlyTransactionSummary(User $user, $filterByYear = null)
    {
        $summary = $user->transactions()
            ->whereYear('transactions.created_at', $filterByYear ?? date("Y"))
            ->get()
            ->groupBy(function ($transaction) {
                return $transaction->created_at->format('M');
            })->map(function ($transactions) {
                return ["sum_amount" => $transactions->sum('amount')];
            })->take(-7);

        $this->setHighest($summary);
        return $summary;
    }

    /**
     * set isHighest to true if the sum_amount is the highest
     *
     * @param Collection $summary
     *
     */
    private function setHighest(Collection $summary)
    {
        $summary->transform(function ($item) use ($summary) {
            $item["isHighest"] = $item["sum_amount"] == $summary->max("sum_amount");
            return $item;
        });
    }
}
