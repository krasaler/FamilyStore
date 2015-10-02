<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/ProductService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/CatalogueService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/ViewModel/ProductViewModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/ProductHelper.php';
require_once __ROOT__ . '/application/Service/CatalogueService.php';
require_once __ROOT__ . '/application/Service/AttributeListService.php';
require_once __ROOT__ . '/application/Service/AttributeService.php';
require_once __ROOT__ . '/application/Service/AttributeValueFloatService.php';
require_once __ROOT__ . '/application/Service/AttributeValueListService.php';

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

    function action_SelectCatalog()
    {
        $model = CatalogueService::GetAll();
        $this->view->generate('/Product/SelectCatalog_view.php', 'template_view.php', $model);
    }

    function action_search()
    {
        $tovarName = $_GET['q'];
        $productsVM = ProductHelper::PopulateProductViewModelList(ProductService::GetByPartialName($tovarName));
        $this->view->generate('/Product/item_view.php', 'template_view.php', $productsVM);
    }

    function action_itemAdmin()
    {
        $productsVM = ProductHelper::PopulateProductViewModelList(ProductService::GetAll());
        $this->view->generate('/Product/itemAdmin_view.php', 'template_view.php', $productsVM);
    }
    function action_update()
    {
        $id = $_POST['id'];
        $name = $_POST['inputName'];
        $price = $_POST['inputPrice'];
        $Description = $_POST['inputDescription'];
        $names = explode(',',$_POST['names']);
        $values = explode(',',$_POST['values']);
        $catalog = $_POST['catalog'];
        $product = ProductService::GetById($id);
        $product->name = $name;
        $product->price = $price;
        $product->description = $Description;
        ProductService::Save($product);
        $product_id = ProductService::GetByName($name)->product_id;
        for ($i = 0; $i < count($names); $i++) {
            $attribute = AttributeService::GetByName($names[$i]);
            if ($attribute->type == 1) {
                $attributeFloat = AttributeValueFloatService::GetByProductIdAndAttributeId($product_id,
                    $attribute->attribute_id);
                $attributeFloat->value = $values[$i];
                AttributeValueFloatService::Save($attributeFloat);
            } else {
                $attributeList = AttributeValueListService::GetByProductIdAndAttributeId($product_id,
                    $attribute->attribute_id);
                $attributeList->value = AttributeListService::GetByAttributeIdAndName($attribute->attribute_id,
                    $values[$i])->attributelist_id;
                AttributeValueListService::Save($attributeList);
            }
        }
        header("Location: /Product/itemAdmin");
    }
    function action_new()
    {
        $name = $_POST['inputName'];
        $price = $_POST['inputPrice'];
        $Description = $_POST['inputDescription'];
        $names = explode(',',$_POST['names']);
        $values = explode(',',$_POST['values']);
        $catalog = $_POST['catalog'];
        $product = new Product();
        $product->name = $name;
        $product->price = $price;
        $product->catalogue_id = CatalogueService::GetByName($catalog)->catalogue_id;
        $product->description = $Description;
        ProductService::Create($product);
        $product_id = ProductService::GetByName($name)->product_id;
        for ($i = 0; $i < count($names); $i++) {
            $attribute = AttributeService::GetByName($names[$i]);
            if ($attribute->type == 1) {
                $attributeFloat = new AttributeValueFloat();
                $attributeFloat->attribute_id = $attribute->attribute_id;
                $attributeFloat->product_id = $product_id;
                $attributeFloat->value = $values[$i];
                AttributeValueFloatService::Create($attributeFloat);
            } else {
                $attributeList = new AttributeValueList();
                $attributeList->product_id = $product_id;
                $attributeList->attribute_id = $attribute->attribute_id;
                $attributeList->value = AttributeListService::GetByAttributeIdAndName($attribute->attribute_id,
                    $values[$i])->attributelist_id;
                AttributeValueListService::Create($attributeList);
            }
        }
        $fr = fopen($_FILES['file-0']['tmp_name'], 'r');
        $fw = fopen(__ROOT__ . '/images/items/item_' . $product_id . '.jpg', "w");
        while (!feof($fr)) {
            $buff  = fread($fr, 1000);
            fwrite($fw,$buff);
        }
        fclose($fr);
        fclose($fw);
        header("Location: /Product/itemAdmin");
    }

    function action_create()
    {
        $c = $_POST['c'];
        if (!is_null($c)) {

            $model = ProductHelper::PopulateProductCreateViewModel(CatalogueService::GetByName($c));
            $this->view->generate('/Product/create_view.php', 'template_view.php', $model);
        } else {
            header("Location: /Product/SelectCatalog");
        }
    }
    function action_edit()
    {
        $id = $_GET['id'];
        if (!is_null($id)) {

            $model = ProductHelper::PopulateProductEditViewModel(ProductService::GetById($id));
            $this->view->generate('/Product/edit_view.php', 'template_view.php', $model);
        } else {
            header("Location: /Main/Index");
        }
    }
    function action_detail()
    {
        $tovarId = $_GET['tovarId'];
        if (!is_null($tovarId)) {
            $this->view->generate('/Product/detail_view.php', 'template_view.php',
                ProductHelper::PopulateProductViewModel(ProductService::GetById($tovarId)));
        } else {
            header("Location: /main/index");
        }
    }

    function action_remove()
    {
        $tovarId = $_GET['tovarId'];
        ProductService::Delete(ProductService::GetById($tovarId));
        header("Location: /product/itemadmin");
    }
}