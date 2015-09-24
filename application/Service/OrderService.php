<?php

class OrderService
{
    public static function GetAll()
    {
        return Order::find('all');
    }
    public static function GetById($orderId)
    {
        return Order::find('all',array('order_id'=>$orderId));
    }
    public static function Save($order)
    {
        $order->save();
    }
    public static function Create($order)
    {
        return Order::create(array(
            'account_id' => $order->account_id,
            'date_order' => $order->date_order,
            'address' => $order->address,
            'statusorder_id' => 1
        ));
    }
    public static function Delete($order)
    {
        $order->delete();
    }
}