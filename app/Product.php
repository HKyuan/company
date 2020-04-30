<?php

namespace App;

use App\Company;
use App\Order;
use App\RelationPivot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    //產品名稱 描述 數量 價格
    //若數量等於 0 時則通知廠商補貨
    protected $fillable =
        ['productName', 'description', 'amount', 'price', 'company_id'];

    protected $casts = ['id' => 'string'];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($product) {
            $product->id = (string) Str::uuid();
        });
    }

    // 一項產品出現在很多訂單當中
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps()->using(RelationPivot::class);
    }

    // 一項產品隸屬一家公司
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}