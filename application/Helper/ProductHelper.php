<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/application/ViewModel/ProductViewModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Service/CatalogueService.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Helper/AttributeValueFloatHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Service/AttributeValueFloatService.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Helper/AttributeValueListHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Service/AttributeValueListService.php';

class ProductHelper
{

    public static function PopulateProductViewModel($product)
    {
        $model = new ProductViewModel();
        $model->Id = $product->product_id;
        $model->name = $product->name;
        $model->price = $product->price;
        $model->description = $product->description;
        $model->ImagePath = './../images/items/item_'.$product->product_id.'.jpg';
        $model->catalogueName = CatalogueService::GetById($product->catalogue_id)->name;
        $model->attributesFloat = AttributeValueFloatHelper::PopulateAttributeValueFloatViewModelList(
          AttributeValueFloatService::GetByProductId($product->product_id)

        );
        $model->attributesList = AttributeValueListHelper::PopulateAttributeValueListViewModelList(
            AttributeValueListService::GetByProductId($product->product_id)
        );
        return $model;
    }

    public static function PopulateProductViewModelList($products)
    {
        for ($i=0;$i<count($products);$i++)
        {
            $models[$i] = ProductHelper::PopulateProductViewModel($products[$i]);
        }
        return $models;

    }
}