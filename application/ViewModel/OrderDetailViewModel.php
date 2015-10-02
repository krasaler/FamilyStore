<?php

class OrderDetailViewModel
{
    public $id;
    public $branch_name;
    public $date_order;
    public $status_name;
    public $account_name;
    public $products;

    public function getSumm()
    {
        $sum=0;
        for($i=0;$i<count($this->products);$i++)
        {
            $sum+=$this->products[$i]->price;
        }
        return $sum;
    }
}