<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function boot()
    {
        parent::boot();
        self::saving(function($model) {
            $model->slug = Str::slug($model->title);
        });
    }
}