<?php

namespace PicPay\User\Infrastructure\Models;

use Database\Factories\UserDocumentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use PicPay\CoreDomain\Infrastructure\Traits\Entity\HasEntity;
use PicPay\User\Domain\Entities\Document;

class UserDocument extends Model
{
    use HasFactory, SoftDeletes, HasEntity;

    protected $table = 'user_documents';

    protected string $baseEntity = Document::class;

    protected $fillable = [
        'user_id',
        'type_id',
        'value'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'type_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function type(): HasOne
    {
        return $this->hasOne(DocumentType::class, 'id', 'type_id');
    }

    protected static function newFactory(): UserDocumentFactory
    {
        return UserDocumentFactory::new();
    }
}
