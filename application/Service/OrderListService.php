<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/ProductService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/ProductHelper.php';
class OrderListService
{
    public static function GetAll()
    {
        return OrderList::find('all');
    }

    public static function GetById($orderListId)
    {
        return OrderList::find('all', array('orderlist_id' => $orderListId));
    }

    public static function GetByOrderId($order_id)
    {
        return OrderList::find('all', array('order_id' => $order_id));
    }
    public static function GetByOrderIdAndProductIdFirst($order_id, $product_id)
    {
        return OrderList::first(['order_id' => $order_id,'product_id'=>$product_id]);
    }
    public static function GetProductsByOrderId($order_id)
    {
        $orders = OrderListService::GetByOrderId($order_id);
        for($i=0; $i<count($orders);$i++)
        {
            $products[$i] = ProductHelper::PopulateProductViewModel(ProductService::GetById($orders[$i]->product_id));
        }
        return $products;
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