<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'name', 'pawd', 'phone', 'company_id'];
    protected $hidden = ['pawd', 'remember_token'];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}