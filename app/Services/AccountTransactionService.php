<?php

namespace App\Services;

use App\Models\Account;
use App\Models\AccountTransaction;
use App\Models\GenericAccountTransaction;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountTransactionService
{
    /**
     * Create a new account transaction
     *
     * @param Account $account
     * @param Model $transactionable
     * @param float|null $amount
     * @param bool $singleDbTransaction
     * @return AccountTransaction|null
     */
    public function create(Account $account, Model $transactionable, float $amount = NULL, bool $singleDbTransaction = TRUE): ?AccountTransaction
    {
        $amount = $amount ?: $transactionable->amount;

        if ($amount == 0) {
            return NULL;
        }

        $create = function () use ($account, $transactionable, $amount) {
            // update account balance
            if ($amount > 0) {
                $account->increment('balance', $amount);
            } else {
                $account->decrement('balance', abs($amount));
            }

            // create account transaction
            $transaction = new AccountTransaction();
            $transaction->account()->associate($account);
            $transaction->transactionable()->associate($transactionable);
            $transaction->amount = $amount;
            $transaction->balance = $account->balance;
            $transaction->save();

            return $transaction;
        };

        return $singleDbTransaction ? DB::transaction(Closure::fromCallable($create)) : $create();
    }

    /**
     * Create a generic transaction
     *
     * @param Account $account
     * @param int $type
     * @param float $amount
     * @return AccountTransaction|null
     */
    public function createGeneric(Account $account, int $type, float $amount): ?AccountTransaction
    {
        if ($amount == 0) {
            return NULL;
        }

        $genericTransaction = new GenericAccountTransaction();
        $genericTransaction->account()->associate($account);
        $genericTransaction->type = $type;
        $genericTransaction->amount = $amount;
        $genericTransaction->save();

        return $this->create($account, $genericTransaction);
    }
}
