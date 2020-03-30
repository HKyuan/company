<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //權限 權限描述
    protected $fillable = ['right', 'description'];

    //一個權限會有被多個角色使用
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}