<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;
    protected $guard = 'member';

    //信箱 姓名 密碼 電話 隸屬公司
    protected $fillable = ['email', 'name', 'password', 'phone', 'company_id'];

    //查詢時不顯示 密碼 token
    protected $hidden = ['password', 'remember_token'];

    //一名員工有多個角色
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    //一名員工只隸屬於一間公司
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}