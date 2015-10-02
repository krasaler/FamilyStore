<?php

require_once __ROOT__.'/application/models/Statusorder.php';
require_once __ROOT__.'/application/ViewModel/OrderViewModel.php';
require_once __ROOT__.'/application/ViewModel/OrderDetailViewModel.php';
require_once __ROOT__.'/application/Service/BranchService.php';
require_once __ROOT__.'/application/Service/OrderListService.php';
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
    public static function PopulateOrderDetailViewModel($order)
    {
        $model = new OrderDetailViewModel();
        $model->id = $order->order_id;
        $model->branch_name = BranchService::GetById($order->branch_id)->name;
        $model->date_order = $order->date_order->format('Y-m-d H:i:s');
        $model->status_name = Statusorder::find(['statusorder_id' => $order->statusorder_id])->name;
        $model->account_name = AccountService::GetById($order->account_id)->account_name;
        $model->products =OrderListService::GetProductsByOrderId($order->order_id);
        return $model;
    }
    public static function PopulateOrderViewModel($order)
    {
        $model = new OrderViewModel();
        $model->id = $order->order_id;
        $model->account_id = $order->account_id;
        $model->branch = BranchService::GetById($order->branch_id)->name;
        $model->date_order = $order->date_order->format('Y-m-d H:i:s');
        $model->status_id = Statusorder::find(['statusorder_id' => $order->statusorder_id])->name;
        return $model;
    }
    public static function PopulateOrderDetailViewModelList($orders)
    {
        for($i=0;$i<count($orders);$i++)
        {
            $model[$i] = OrderHelper::PopulateOrderDetailViewModel($orders[$i]);
        }
        return $model;
    }
    public static function PopulateOrderViewModelList($orders)
    {
        for($i=0;$i<count($orders);$i++)
        {
            $model[$i] = OrderHelper::PopulateOrderViewModel($orders[$i]);
        }
        return $model;
    }
}