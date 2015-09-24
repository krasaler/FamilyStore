<?php
require_once __ROOT__.'/application/Service/AttributeListService.php';
require_once __ROOT__.'/application/ViewModel/AttributeListViewModel.php';
require_once __ROOT__.'/application/Helper/AttributeHelper.php';
require_once __ROOT__.'/application/Service/AttributeService.php';
class AttributeListHelper
{
    public static function PopulateAttributeListViewModel($attribute)
    {
        $model = new AttributeListViewModel();
        $model->id = $attribute->id;
        $model->attribute = AttributeHelper::PopulateAttributeViewModel(AttributeService::GetById(
            $attribute->attribute_id));
        $model->value = $attribute->name;
        return $model;
    }

    public static function PopulateAttributeListViewModelList($attributes)
    {
        for ($i=0;$i<count($attributes);$i++)
        {
            $models[$i] = AttributeValueFloatHelper::PopulateAttributeValueFloatViewModel($attributes[$i]);
        }
        return $models;
    }
}