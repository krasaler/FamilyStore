<?php

require_once __ROOT__.'/application/models/Statusorder.php';
class OrderHelper
{
    public static function PopulateOrderFromBasketViewModel($model,$account_id)
    {
        $order = new Order();
        $order->account_id = $account_id;
        $order->branch_id = $model->branch->branch_id;
        $order->date_order = date("Y-m-d H:i:s");
        return $order;
    }
}