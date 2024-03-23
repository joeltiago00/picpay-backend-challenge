<?php

namespace PicPay\User\Infrastructure\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PicPay\Shared\Infrastructure\Models\GenericStatus;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'type_id',
        'status_id'
    ];

    protected $casts = [
        'id' => 'string',
        'type_id' => 'integer'
    ];

    public function typeId(): HasOne
    {
        return $this->hasOne(UserType::class,'id', 'type_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(GenericStatus::class, 'id', 'status_id');
    }

    public function document(): HasOne
    {
        return $this->hasOne(UserDocument::class, 'user_id', 'id');
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}