<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    //統一編號 公司名稱 電話
    protected $fillable = ['uniform', 'companyName', 'phone'];

    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($company) {
            $company->id = (string) Str::uuid();
        });
    }

    //一名公司有多名員工
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}