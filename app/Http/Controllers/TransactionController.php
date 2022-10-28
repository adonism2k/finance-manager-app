<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionCollection;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionController extends Controller
{
    private TransactionRepository $transaction;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transaction = $transactionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\TransactionCollection
     */
    public function index(): ResourceCollection
    {
        return new TransactionCollection($this->transaction->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $transaction = $this->transaction->create($request->validated());
        return new TransactionResource($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $trx = $this->transaction->update($transaction, $request->validated());
        return new TransactionResource($trx);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $this->transaction->delete($transaction);
        return response()->noContent();
    }
}
