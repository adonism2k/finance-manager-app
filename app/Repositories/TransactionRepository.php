<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Interfaces\TransactionInterface;

class TransactionRepository implements TransactionInterface
{
    public function all($search = null)
    {
        return Transaction::search($search)->with('account')->paginate();
    }

    public function find(Transaction $transaction): Transaction
    {
        return Transaction::find($transaction);
    }

    public function create(array $data): Transaction
    {
        return Transaction::create($data);
    }

    public function update(Transaction $transaction, array $data): Transaction
    {
        $transaction->update($data);
        return $transaction;
    }

    public function delete(Transaction $transaction): bool
    {
        return Transaction::destroy($transaction->id);
    }
}
