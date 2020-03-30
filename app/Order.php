<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //訂單編號 總數量 總價格 是否付款
    protected $fillable = ['uuid', 'totalQty', 'price', 'paid', 'user_id'];

    //一筆訂單會有很多產品
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    //一筆訂單由一位使用者產生
    public function user()
    {
        return $this->belongsTo('App\Member');
    }
}