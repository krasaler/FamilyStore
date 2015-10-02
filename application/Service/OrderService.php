<?php

class OrderService
{
    public static function GetAll()
    {
        return Order::find('all');
    }
    public static function GetById($orderId)
    {
        return Order::find(array('order_id'=>$orderId));
    }
    public static function GetByAccountId($account_id)
    {
        return Order::find('all',array('account_id'=>$account_id));
    }
    public static function GetByStatusId($status_id)
    {
        return Order::find('all',array('statusorder_id'=>$status_id));
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
            'branch_id' => $order->branch_id,
            'statusorder_id' => 1
        ));
    }
    public static function Delete($order)
    {
        $order->delete();
    }
}