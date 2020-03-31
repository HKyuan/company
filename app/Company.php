<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Company extends Model
{
    //統一編號 公司名稱 電話
    protected $fillable = ['uniform', 'companyName', 'phone'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($company) {
            $company->id = (string) Uuid::generate(4);
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

    //一名公司有多名員工
    public function members()
    {
        return $this->hasMany('App\Member');
    }
}