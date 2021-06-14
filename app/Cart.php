<?php


namespace App;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $discount = 0;
    public $percent = 0;
    public $coupon_text = '';
    public $discountedPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->discount = $oldCart->discount;
            $this->discountedPrice = $oldCart->discountedPrice;
            $this->coupon_text = $oldCart->coupon_text;
            $this->percent = $oldCart->percent;
        }
    }

    public function add($item, $id, $quantity = 1)
    {
        $storedItem = [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'qty' => 0,
            'total_price' => $item->price,
            'image' => $item->getImage(),
            'link' => route('category.product', [$item->category->slug, $item->slug])
        ];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        if (!$this->items) {
            $this->totalPrice = 0;
        }
        $storedItem['qty'] += $quantity;
        $storedItem['total_price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty += $quantity;
        $this->totalPrice = $this->totalPrice + ($item->price * $quantity);

        $this->discountedPrice = ((100 - $this->percent) / 100) * $this->totalPrice;
        $this->discount = $this->totalPrice - $this->discountedPrice;
    }


    public function delete($item, $id)
    {

        if ($this->items[$id]['qty'] == 1) {
            unset($this->items[$id]);
        } else {
            $this->items[$id]['qty']--;
            $this->items[$id]['total_price'] -=  $item->price;
        }
        $this->totalQty--;
        $this->totalPrice -= $item->price;

        $this->discountedPrice = ((100 - $this->percent) / 100) * $this->totalPrice;
        $this->discount = $this->totalPrice - $this->discountedPrice;
    }

    public function applyPromo($coupon_text, $percent)
    {
        $this->coupon_text = $coupon_text;
        $this->percent = $percent;
        $this->discountedPrice = ((100 - $percent) / 100) * $this->totalPrice;
        $this->discount = $this->totalPrice - $this->discountedPrice;
    }
}