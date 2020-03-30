<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //統一編號 公司名稱 電話
    protected $fillable = ['uniform', 'companyName', 'phone'];

    //一名公司有多名員工
    public function members()
    {
        return $this->hasMany('App\Member');
    }
}