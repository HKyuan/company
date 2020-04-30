<?php

namespace App;

use App\Member;
use App\Permission;
use App\RelationPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    //職位 部門
    protected $fillable = ['title', 'dept'];

    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($role) {
            $role->id = (string) Str::uuid();
        });
    }

    // 一個角色可以被分配給多個員工
    public function members()
    {
        return $this->belongsToMany(Member::class)->withTimestamps()->using(RelationPivot::class);
    }

    // 一個角色擁有多個權限
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps()->using(RelationPivot::class);
    }
}