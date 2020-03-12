<?php
namespace App;

class Cart{
    public $items=null;
    public $totalQuantity=0;
    public $totalPrice=0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items=$oldCart->items;
            $this->totalQuantity=$oldCart->totalQuantity;
            $this->totalPrice=$oldCart->totalPrice;
        }
    }

    public function __destruct(){
    }

    public function add($item, $id){
        $cart=['quantity'=>0, 'price'=>$item->price_out, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $cart=$this->items[$id];
            }
        }
        $cart['quantity']++;
        $cart['price']=$item->price_out * $cart['quantity'];
        $this->items[$id]=$cart;
        $this->totalQuantity++;
        $this->totalPrice += $item->price_out;
    }

    public function remove($id){
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']->price_out;
        $this->totalQuantity--;
        $this->totalPrice -= $this->items[$id]['item']->price_out;
        if($this->items[$id]['quantity']<=0){
            unset($this->items[$id]);
        }
    }

}
?>