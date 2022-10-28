<?php

namespace App\Repositories;

use App\Models\Account;
use App\Interfaces\AccountInterface;

class AccountRepository implements AccountInterface
{
    public function all($search = null)
    {
        return Account::search($search)->paginate();
    }

    public function find(Account $account): Account
    {
        return Account::find($account);
    }

    public function create(array $data): Account
    {
        return Account::create($data);
    }

    public function update(Account $account, array $data): Account
    {
        $account->update($data);
        return $account;
    }

    public function delete(Account $account): bool
    {
        return Account::destroy($account->id);
    }
}
