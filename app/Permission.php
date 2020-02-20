<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $tables = 'permissions';
    protected $primaryKey = 'id';
    protected $fillable = ['right', 'description'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}