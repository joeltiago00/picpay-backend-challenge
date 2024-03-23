<?php

namespace PicPay\User\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_types';

    protected $fillable = ['name'];

    protected $casts = [
        'id' => 'integer'
    ];
}
