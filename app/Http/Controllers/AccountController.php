<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Response;
use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountCollection;
use App\Repositories\AccountRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AccountController extends Controller
{
    private AccountRepository $account;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->account = $accountRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(Request $request): ResourceCollection
    {
        $search = $request->query('search');
        return new AccountCollection($this->account->all($search));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AccountRequest  $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(AccountRequest $request): JsonResource
    {
        $account = $this->account->create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()]
        ));

        return new AccountResource($account);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return  \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Account $account): JsonResource
    {
        return new AccountResource($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AccountRequest  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(AccountRequest $request, Account $account): JsonResource
    {
        $acc = $this->account->update($account, $request->validated());
        return new AccountResource($acc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account): Response
    {
        $this->account->delete($account);
        return response()->noContent();
    }
}
