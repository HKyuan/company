<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Webpatser\Uuid\Uuid;

class Role_User extends Pivot
{
    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($ru) {
            $ru->id = (string) Uuid::generate(4);
        });
    }
}