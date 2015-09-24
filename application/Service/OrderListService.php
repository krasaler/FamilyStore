<?php


class OrderListService
{
    public static function GetAll()
    {
        return OrderList::find('all');
    }
    public static function GetById($orderListId)
    {
        return OrderList::find('all',array('orderlist_id'=>$orderListId));
    }
    public static function GetByOrderId($order_id)
    {
        return OrderList::find('all',array('order_id'=>$order_id));
    }
    public static function Save($orderList)
    {
        $orderList->save();
    }
    public static function Create($orderList)
    {
        OrderList::create(array(
            'order_id' => $orderList->order_id,
            'product_id' => $orderList->product_id
        ));
    }
    public static function Delete($orderList)
    {
        $orderList->delete();
    }
}