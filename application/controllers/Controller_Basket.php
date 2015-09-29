<?php
require_once __ROOT__.'/application/ViewModel/BasketViewModel.php';
require_once __ROOT__.'/application/ViewModel/ProductViewModel.php';
require_once __ROOT__.'/application/Service/ProductService.php';
require_once __ROOT__.'/application/Helper/ProductHelper.php';
require_once __ROOT__.'/application/Service/OrderListService.php';
require_once __ROOT__.'/application/Helper/OrderHelper.php';
require_once __ROOT__.'/application/Service/OrderService.php';
require_once __ROOT__.'/application/Service/AccountService.php';
require_once __ROOT__.'/application/EmailService/EmailService.php';
require_once __ROOT__.'/application/Service/BranchService.php';
class Controller_Basket extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function action_index()
    {
        session_start();
        $model = $_SESSION['basket'];
        if (!isset($model)) {
            $model = new BasketViewModel();
        }
        $this->view->generate('basket_view.php', 'template_view.php', $model);
    }

    function action_add()
    {
        session_start();
        $model = $_SESSION['basket'];
        if (!isset($model)) {
            $model = new BasketViewModel();
        }
        $productId = $_POST['productId'];
        $model->Add(
            ProductHelper::PopulateProductViewModel(ProductService::GetById($productId))
        );
        $_SESSION['basket'] = $model;
    }

    function action_minus()
    {
        session_start();
        $model = $_SESSION['basket'];
        $productId = $_POST['productId'];
        $model->Minus(
            ProductHelper::PopulateProductViewModel(ProductService::GetById($productId))
        );
        $_SESSION['basket'] = $model;
    }

    function action_remove()
    {
        session_start();
        $model = $_SESSION['basket'];
        $productId = $_POST['productId'];
        $model->Remove(
            ProductHelper::PopulateProductViewModel(ProductService::GetById($productId))
        );
        $_SESSION['basket'] = $model;
    }

    function action_inputAddress()
    {
        session_start();
        $model = $_SESSION['basket'];
        if(!is_null($_SESSION["login"])) {
            $this->view->generate('inputAddress_view.php', 'template_view.php', $model);
        }
        else
        {
            header('Location: /Account/login');
        }
    }
    function action_order()
    {
        session_start();
        $model = $_SESSION['basket'];
        $login = $_SESSION["login"];
        if(!is_null($_SESSION["login"])) {
            $account =  AccountService::GetByName($login, true);
            $order = OrderHelper::PopulateOrderFromBasketViewModel($model,$account->account_id);
            $order = OrderService::Create($order);
            $products = $model->products;
            for ($i = 0; $i < count($products); $i++) {
                $orderlist = new OrderList();
                $orderlist->order_id = $order->order_id;
                $orderlist->product_id = $products[$i]->Id;
                OrderListService::Create($orderlist);
            }
            $_SESSION['basket'] = null;
            EmailService::SendNewOrderMessage($account,$order->order_id, $model->SumPrice());
            $data = $order->order_id;
            $this->view->generate('Order_view.php', 'template_view.php', $data);
        }
        else
        {
            header('Location: /Account/login');
        }
    }
    function action_ConfirmOrder()
    {
        session_start();
        $model = $_SESSION['basket'];
        if(!is_null($_SESSION["login"])) {
            $address = $_GET['a'];
            $model->branch = BranchService::GetByAddress($address);
            $_SESSION['basket'] = $model;
            $this->view->generate('ConfirmOrder_view.php', 'template_view.php', $model);
        }
        else
        {
            header('Location: /Account/login');
        }
    }
}