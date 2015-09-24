<?php

require_once __ROOT__.'/application/Service/AttributeGroupService.php';
require_once __ROOT__.'/application/Service/UnitService.php';
class AttributeHelper
{
    public static function PopulateAttributeViewModel($attribute)
    {
        $model = new AttributeViewModel();
        $model->id = $attribute->attribute_id;
        $model->attributeGroupName = AttributeGroupService::GetById($attribute->attributegroup_id)->name;
        $model->status = $attribute->status;
        $model->name = $attribute->name;
        $model->type = $attribute->type;
        $model->unit = UnitService::GetById($attribute->unit_id)->name;
        return $model;
    }

    public static function PopulateAttributeViewModelList($attributes)
    {
        for ($i=0;$i<count($attributes);$i++)
        {
            $models[$i] = AttributeValueFloatHelper::PopulateAttributeValueFloatViewModel($attributes[$i]);
        }
        return $models;

    }
}