<?php
require_once __ROOT__.'/application/ViewModel/AttributeGroupViewModel.php';
class AttributeGroupHelper
{
    public static function PopulateAttributeGroupViewModel($attribute)
    {
        $model = new AttributeGroupViewModel();
        $model->id = $attribute->attributegroup_id;
        $model->name = $attribute->name;
        $model->attributes = $attribute->attributes;
        return $model;
    }

    public static function PopulateAttributeGroupViewModelList($attributes)
    {
        for ($i=0;$i<count($attributes);$i++)
        {
            $models[$i] = AttributeGroupHelper::PopulateAttributeGroupViewModel($attributes[$i]);
        }
        return $models;

    }
}