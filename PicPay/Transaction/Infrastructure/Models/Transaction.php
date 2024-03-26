<?php

namespace PicPay\Transaction\Infrastructure\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use PicPay\Shared\Infrastructure\Models\GenericStatus;
use PicPay\Wallet\Infrastructure\Models\Wallet;

class Transaction extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $table = 'transactions';
    public $incrementing = false;

    protected $fillable = [
        'payer_wallet_id',
        'payee_wallet_id',
        'amount',
        'status_id',
        'type_id',
        'transaction_refound_id',
        'refound_reason'
    ];

    public function payerWallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'id', 'payer_wallet_id');
    }

    public function payeeWallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'id', 'payee_wallet_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(GenericStatus::class, 'id', 'status_id');
    }

    public function type(): HasOne
    {
        return $this->hasOne(TransactionType::class, 'id', 'type_id');
    }

    public function refoundTransaction(): HasOne
    {
        return $this->hasOne(Transaction::class, 'id', 'transaction_refound_id');
    }
}
