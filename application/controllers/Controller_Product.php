<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/ProductService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/ViewModel/ProductViewModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/ProductHelper.php';
class Controller_Product extends Controller
{
    function action_index()
    {

        if (isset($_GET['p'])) {
            $page = $_GET['p'];
        } else {
            $page = 1;
        }
        if (isset($_GET['c'])) {
            $productsVM = ProductHelper::PopulateProductViewModelList(ProductService::GetByCatalogue($_GET['c']));
        } else {
            $productsVM = ProductHelper::PopulateProductViewModelList(ProductService::GetAll());
        }
        $this->view->generate('/Product/item_view.php', 'template_view.php', $productsVM);
    }
    function action_search()
    {
        $tovarName = $_GET['q'];
        $productsVM = ProductHelper::PopulateProductViewModelList(ProductService::GetByPartialName($tovarName));
        $this->view->generate('/Product/item_view.php', 'template_view.php', $productsVM);
    }
    function action_detail()
    {
        $tovarId = $_GET['tovarId'];
        $this->view->generate('/Product/detail_view.php', 'template_view.php',
            ProductHelper::PopulateProductViewModel(ProductService::GetById($tovarId)));
    }
}