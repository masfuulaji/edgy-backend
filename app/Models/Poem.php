<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poem extends Model
{
    use HasFactory, HasUuid, HasSlug, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    public $keyType = 'uuid';
    public $incrementing = false;
}
