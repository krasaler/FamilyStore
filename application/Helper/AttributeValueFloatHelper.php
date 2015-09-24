<?php

require_once __ROOT__.'/application/Service/UnitService.php';
require_once __ROOT__.'/application/Service/AttributeService.php';
require_once __ROOT__.'/application/Helper/AttributeHelper.php';
require_once __ROOT__.'/application/Helper/ProductHelper.php';
require_once __ROOT__.'/application/ViewModel/AttributeFloatViewModel.php';
require_once __ROOT__.'/application/ViewModel/AttributeViewModel.php';
require_once __ROOT__.'/application/ViewModel/ProductViewModel.php';
class AttributeValueFloatHelper
{
    public static function PopulateAttributeValueFloatViewModel($attribute)
    {
        $model = new AttributeFloatViewModel();
        $model->id = $attribute->attributevaluefloat_id;
        $model->attribute = AttributeHelper::PopulateAttributeViewModel(AttributeService::GetById($attribute->attribute_id));
        //$model->product = ProductHelper::PopulateProductViewModel(ProductService::GetById($attribute->product_id));
        $model->value = $attribute->value;
        return $model;
    }

    public static function PopulateAttributeValueFloatViewModelList($attributes)
    {
        for ($i=0;$i<count($attributes);$i++)
        {
            $models[$i] = AttributeValueFloatHelper::PopulateAttributeValueFloatViewModel($attributes[$i]);
        }
        return $models;

    }
}