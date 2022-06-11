<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'name',
        'description',
    ];

    public $keyType = 'uuid';
    public $incrementing = false;
}
