<?php


namespace App;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }

    public function add($item, $id){
        $storedItem = ['id' => $item->id, 'name' => $item->name, 'price' => $item->price, 'qty' => 0, 'total_price' => $item->price, 'image' => $item->image];

        if($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        if(!$this->items){
           $this->totalPrice = 0;
        }
        $storedItem['qty']++;
        $storedItem['total_price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice = $this->totalPrice + $item->price;

    }


    public function delete($item, $id){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

        if($this->items[$id]['qty']==1){
            unset($this->items[$id]);
        }

        else{
            $this->items[$id]['qty']--;
            $this->items[$id]['total_price'] -=  $item->price;

        }
        $this->totalQty--;
        $this->totalPrice -= $item->price;

    }

}
