<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Webpatser\Uuid\Uuid;

class Permission_Role extends Pivot
{
    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($pr) {
            $pr->id = (string) Uuid::generate(4);
        });
    }
}