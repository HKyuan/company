<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Role extends Model
{
    //職位 部門
    protected $fillable = ['title', 'dept'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($role) {
            $role->id = (string) Uuid::generate(4);
        });
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getIncrementing()
    {
        return false;
    }

    // 一個角色可以被分配給多個員工
    public function members()
    {
        return $this->belongsToMany('App\Member');
    }

    // 一個角色擁有多個權限
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}