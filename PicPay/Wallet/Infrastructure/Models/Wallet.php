<?php

namespace PicPay\Wallet\Infrastructure\Models;

use Database\Factories\WalletFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use PicPay\CoreDomain\Infrastructure\Traits\Entity\HasEntity;
use PicPay\Transaction\Infrastructure\Enums\TypeEnum;
use PicPay\Transaction\Infrastructure\Models\Transaction;
use PicPay\User\Infrastructure\Models\User;
use PicPay\Wallet\Domain\Entities\Wallet as WalletEntity;

class Wallet extends Model
{
    use HasUuids, HasFactory, SoftDeletes, HasEntity;

    protected $table = 'wallets';

    protected string $baseEntity = WalletEntity::class;

    public $incrementing = false;

    protected $fillable = [
        'user_id'
    ];

    protected $casts = [
        'id' => 'string',
        'user_id' => 'integer'
    ];

    protected static function newFactory(): WalletFactory
    {
        return WalletFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function entriesTransactionsAsPayee(): HasMany
    {
        return $this->hasMany(Transaction::class, 'payee_wallet_id')
            ->whereIn('type_id', [TypeEnum::ENTRY->value, TypeEnum::TRASNFER->value]);
    }

    public function refoundsTransactionsAsPayee(): HasMany
    {
        return $this->hasMany(Transaction::class, 'payee_wallet_id')
            ->where('type_id', TypeEnum::REFOUND->value);
    }

    public function entriesTransactionsAsPayer(): HasMany
    {
        return $this->hasMany(Transaction::class, 'payer_wallet_id')
            ->whereIn('type_id', [TypeEnum::ENTRY->value, TypeEnum::TRASNFER->value]);
    }

    public function refoundsTransactionsAsPayer(): HasMany
    {
        return $this->hasMany(Transaction::class, 'payer_wallet_id')
            ->where('type_id', TypeEnum::REFOUND->value);
    }
}
