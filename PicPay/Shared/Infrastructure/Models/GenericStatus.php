<?php

namespace PicPay\Shared\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenericStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'generic_status';

    protected $fillable = ['name'];

    protected $casts = [
        'id' => 'integer',
    ];
}
