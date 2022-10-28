<?php

namespace App\Interfaces;

use App\Models\Account;

interface AccountInterface
{
    public function all($search);

    public function find(Account $account);

    public function create(array $data);

    public function update(Account $account, array $data);

    public function delete(Account $account);
}
