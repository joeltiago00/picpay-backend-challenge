<?php

namespace PicPay\User\Infrastructure\Models;

use Database\Factories\DocumentTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'document_types';

    protected $fillable = ['name'];

    protected $casts = [
        'id' => 'integer',
    ];

    protected static function newFactory(): DocumentTypeFactory
    {
        return DocumentTypeFactory::new();
    }
}
