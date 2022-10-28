<?php

namespace App\Interfaces;

use App\Models\Transaction;

interface TransactionInterface
{
    public function all($search = null);

    public function find(Transaction $transaction);

    public function create(array $data);

    public function update(Transaction $transaction, array $data);

    public function delete(Transaction $transaction);
}
