<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

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
            $permission->id = (string) Uuid::generate(4);
        });
    }

    //一個權限會有被多個角色使用
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}