<?php
require_once __ROOT__.'/application/ViewModel/AttributeValueListViewModel.php';
require_once __ROOT__.'/application/Service/AttributeService.php';
require_once __ROOT__.'/application/Service/ProductService.php';
require_once __ROOT__.'/application/Helper/AttributeHelper.php';
require_once __ROOT__.'/application/Helper/ProductHelper.php';
require_once __ROOT__.'/application/Helper/AttributeListHelper.php';
class AttributeValueListHelper
{
    public static function PopulateAttributeValueListViewModel($attribute)
    {
        $model = new AttributeValueListViewModel();
        $model->id = $attribute->id;
        //$model->product =ProductHelper::PopulateProductViewModel(ProductService::GetById($attribute->product_id));
        $model->attribute = AttributeHelper::PopulateAttributeViewModel(AttributeService::GetById(
            $attribute->attribute_id));
        $model->value = AttributeListHelper::PopulateAttributeListViewModel(AttributeListService::GetById(
            $attribute->value))->value;
        return $model;
    }

    public static function PopulateAttributeValueListViewModelList($attributes)
    {
        for ($i=0;$i<count($attributes);$i++)
        {
            $models[$i] = AttributeValueListHelper::PopulateAttributeValueListViewModel($attributes[$i]);
        }
        return $models;
    }
}