<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //產品名稱 描述 數量 價格
    //若數量等於 0 時則通知廠商補貨
    protected $fillable =
        ['productName', 'description', 'amount', 'price', 'company_id'];

    // 一項產品出現在很多訂單當中
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    // 一項產品隸屬一家公司
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}