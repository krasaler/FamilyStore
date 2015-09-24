<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/ProductService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/ViewModel/ProductViewModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/ProductHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/AccountService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/ReviewService.php';

class Controller_Catalog extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function action_index()
    {
        if (isset($_GET['p'])) {
            $page = $_GET['p'];
        } else {
            $page = 1;
        }
        if (isset($_GET['catalogue'])) {
            $productsVM = ProductHelper::PopulateProductViewModelList(ProductService::GetByCatalogue($_GET['catalogue']));
        } else {
            $productsVM = ProductHelper::PopulateProductViewModelList(ProductService::GetAll());
        }
        $this->view->generate('catalog_view.php', 'template_view.php', $productsVM);
    }

    function action_detail()
    {
        $tovarId = $_GET['tovarId'];
        $this->view->generate('detail_view.php', 'template_view.php',
            ProductHelper::PopulateProductViewModel(ProductService::GetById($tovarId)));
    }
    function action_newReview()
    {
        session_start();
        $tovarId = $_POST['tovarId'];
        $login = $_SESSION["login"];
        $review = new Review();
        $review->product_id = $_POST['tovarId'];
        $review->account_id = AccountService::GetByName($login,true)->account_id;
        $review->value = $_POST['review'];
        ReviewService::Create($review);
        $this->view->generate('detail_view.php', 'template_view.php',
            ProductHelper::PopulateProductViewModel(ProductService::GetById($tovarId)));
    }
    function action_search()
    {
        $tovarName = $_GET['q'];
        $productsVM = ProductHelper::PopulateProductViewModelList(ProductService::GetByPartialName($tovarName));
        $this->view->generate('catalog_view.php', 'template_view.php', $productsVM);
    }
}