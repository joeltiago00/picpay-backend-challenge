<?php

namespace PicPay\Transaction\Infrastructure\Models;

use Database\Factories\TransactionTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaction_types';

    protected $fillable = ['name'];

    protected $casts = [
        'id' => 'integer'
    ];

    protected static function newFactory(): TransactionTypeFactory
    {
        return TransactionTypeFactory::new();
    }
}
