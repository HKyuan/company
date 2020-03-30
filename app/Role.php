<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //職位 部門
    protected $fillable = ['title', 'dept'];

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