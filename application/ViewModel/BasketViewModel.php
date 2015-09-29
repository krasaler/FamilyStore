<?php

class BasketViewModel
{
    public $products;
    public $counts;
    public $branch;

    public function __construct()
    {

    }

    public function Add($product)
    {
        if (is_null($this->products)) {
            $this->products[0] = $product;
            $this->counts[0] = 1;
        } else {
            $index = $this->SearchByArray($product, $this->products);
            if ($index >= 0) {
                $this->products[$index] = $product;
                $this->counts[$index]++;
            } else {
                $index = count($this->products);
                $this->products[$index] = $product;
                $this->counts[$index]=1;
            }
        }
    }
    public function Minus($product)
    {
        $index = $this->SearchByArray($product, $this->products);
        if ($index >= 0) {
            if($this->counts[$index]>1)
            {
                $this->counts[$index]--;
            }
            else
            {
                $this->products = $this->RemoveValue($index, $this->products);
                $this->counts = $this->RemoveValue($index, $this->counts);
            }
        }
    }
    public function Remove($product)
    {
        $index = $this->SearchByArray($product, $this->products);
        if ($index >= 0) {
            $this->products = $this->RemoveValue($index, $this->products);
            $this->counts = $this->RemoveValue($index, $this->counts);
        }
    }
    public function getCount()
    {
        return count($this->products);
    }
    public function RemoveValue($index,$array)
    {
        for ($i = 0, $j=0; $i < count($array); $i++) {
            if ($i!=$index) {
                $res[$j] = $array[$i];
                $j++;
            }
        }
        return $res;
    }
    public function SearchByArray($value, $array)
    {
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i]->Id == $value->Id) {
                return $i;
            }
        }
        return -1;
    }

    public function SumPrice()
    {
        $sum = 0;
        for ($i = 0; $i < count($this->products); $i++) {
            $sum = $sum + $this->products[$i]->price * $this->counts[$i];
        }
        return $sum;
    }
}
