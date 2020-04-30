<?php

namespace App;

use App\Product;
use App\RelationPivot;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    //訂單編號 總數量 總價格 是否付款
    protected $fillable = ['amount', 'price', 'paid', 'user_id'];

    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($order) {
            $order->id = (string) Str::uuid();
        });
    }

    //一筆訂單會有很多產品
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()->using(RelationPivot::class);
    }

    //一筆訂單由一位使用者產生
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}