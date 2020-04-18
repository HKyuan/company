<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Webpatser\Uuid\Uuid;

class Order_Product extends Pivot
{
    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($op) {
            $op->id = (string) Uuid::generate(4);
        });
    }
}