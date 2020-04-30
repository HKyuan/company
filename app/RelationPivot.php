<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class RelationPivot extends Pivot
{
    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($rp) {
            $rp->id = (string) Str::uuid();
        });
    }
}