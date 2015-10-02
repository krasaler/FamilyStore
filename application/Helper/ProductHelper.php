<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/application/ViewModel/ProductViewModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Service/CatalogueService.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Helper/AttributeValueFloatHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Service/AttributeValueFloatService.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Helper/AttributeValueListHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/application/Service/AttributeValueListService.php';
require_once __ROOT__.'/application/ViewModel/ProductCreateViewModel.php';
require_once __ROOT__.'/application/Service/CatalogueAttributeService.php';

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

    public static function PopulateProductCreateViewModel($catalogue)
    {
        $model = new ProductCreateViewModel();
        $attributes = CatalogueAttributeService::GetAttributesByCatalogueId($catalogue->catalogue_id);
        foreach($attributes as $value)
        {
            if($value->type==1)
            {
                $model->attributesFloat[count($model->attributesFloat)] = $value;
            }
            else
            {
                $model->ListName[count($model->attributesList)] = $value->name;
                $model->attributesList[count($model->attributesList)] = AttributeListService::GetByAttributeId(
                    $value->attribute_id);
            }
        }
        return $model;
    }
}