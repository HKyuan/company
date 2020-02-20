<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'dept'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function members()
    {
        return $this->belongsToMany('App\Member');
    }
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}