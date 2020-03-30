<?php

namespace App;

class Cart
{
    private $items = null;
    private $totalPrice = 0;
    private $totalQty = 0;

    public function __construct($prevCart)
    {
        if ($prevCart) {
            $this->items = $prevCart->item;
            $this->totalPrice = $prevCart->totalPrice;
            $this->totalQty = $prevCart->totalQty;
        }
    }
    public function add($item, $id)
    {
        //初始化購物車陣列
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        //如果陣列內有任何一項商品
        if ($this->items) {
            //檢查這個陣列內是否已存在這個 編號 的商品
            if (array_key_exists($id, $this->items)) {
                //使用原本裡面的陣列
                $storedItem = $this->items[$id];
            }
        }
        //每呼叫一次，數量就加一
        $storedItem['qty']++;
        //每呼叫一次，就重算一次商品的價格
        $storedItem['price'] = $item->price * $storedItem['qty'];
        //這個陣列會儲存更新後的 數量 和 價錢 陣列
        $this->items[$id] = $storedItem;
        //更新全部的數量
        $this->totalQty++;
        //更新加總的價格
        $this->totalPrice += $item->price;
    }

    public function increaseByOne($id)
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];
    }
    public function decreaseByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] < 1) {
            unset($this->items[$id]);
        }
    }
    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

    public function clearCart()
    {
        $prevCart = Session::has('cart') ? Session::forget('cart') : null;
    }
}