<?php

require_once __ROOT__.'/application/Helper/OrderHelper.php';
require_once __ROOT__.'/application/Service/OrderService.php';
require_once __ROOT__.'/application/Service/OrderListService.php';
require_once __ROOT__.'/application/Service/AccountService.php';
require_once __ROOT__.'/application/Helper/StatusHelper.php';
require_once __ROOT__.'/application/Service/StatusService.php';
class Controller_Order extends Controller
{
    public function action_detail()
    {
        $order_id = $_GET['id'];
        $model = OrderHelper::PopulateOrderDetailViewModel(OrderService::GetById($order_id));
        $this->view->generate('/Order/detail_view.php', 'template_view.php', $model);
    }
    public function action_cancel()
    {
        PermissionHelper::Verification('Editor');
        $order_id = $_GET['id'];
        $order = OrderService::GetById($order_id);
        $order->statusorder_id = 2;
        OrderService::Save($order);
        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
    public function action_removeproduct()
    {
        PermissionHelper::Verification('Editor');
        $order_id = $_GET['orderId'];
        $product_id = $_GET['productId'];
        $orderList = OrderListService::GetByOrderIdAndProductIdFirst($order_id,$product_id);
        OrderListService::Delete($orderList);
        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
    public function action_item()
    {
        PermissionHelper::Verification('Editor');
        $status_id = $_GET['id'];
        $model = OrderHelper::PopulateOrderDetailViewModelList(OrderService::GetByStatusId($status_id));
        $this->view->generate('/Order/item_view.php', 'template_view.php',$model);
    }
    public function action_EditStatus()
    {
        PermissionHelper::Verification('Editor');
        $order_id = $_GET['id'];
        $model = StatusHelper::PopulateStatusViewModel($order_id);
        $this->view->generate('/Order/EditStatus_view.php', 'template_view.php',$model);
    }
    public function action_NewStatus()
    {
        PermissionHelper::Verification('Editor');
        $name = $_POST['InputStatus'];
        $order_id = $_POST['id'];
        $order = OrderService::GetById($order_id);
        $oldStatus =$order->statusorder_id;
        $order->statusorder_id = StatusService::GetByName($name)->statusorder_id;
        OrderService::Save($order);
        header("Location: /Order/Item?id=".$oldStatus);
    }
}