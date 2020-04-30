<?php

namespace App;

use App\RelationPivot;
use App\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    //權限 權限描述
    protected $fillable = ['right', 'description'];

    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($permission) {
            $permission->id = (string) Str::uuid();
        });
    }

    //一個權限會有被多個角色使用
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps()->using(RelationPivot::class);
    }
}