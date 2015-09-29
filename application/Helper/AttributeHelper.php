<?php

require_once __ROOT__.'/application/Service/AttributeGroupService.php';
require_once __ROOT__.'/application/Service/UnitService.php';
require_once __ROOT__.'/application/ViewModel/AttributeViewModel.php';
class AttributeHelper
{
    public static function PopulateAttributeViewModel($attribute)
    {
        $model = new AttributeViewModel();
        $model->id = $attribute->attribute_id;
        $model->attributeGroupName = AttributeGroupService::GetById($attribute->attributegroup_id)->name;
        $model->status = ($attribute->status==1)?"Разрешен к показу":"Запрещен к показу";
        $model->name = $attribute->name;
        $model->type = ($attribute->type==1)?"Обычный":"Список";
        $model->unit = UnitService::GetById($attribute->unit_id)->name;
        return $model;
    }

    public static function PopulateAttributeViewModelList($attributes)
    {
        for ($i=0;$i<count($attributes);$i++)
        {
            $models[$i] = AttributeHelper::PopulateAttributeViewModel($attributes[$i]);
        }
        return $models;

    }
    public static function PopulateAttributeFromEditModel($id,$name, $attributeGroupName, $attributeUnitName)
    {
        $attribute = AttributeService::GetById($id);
        $attribute->attributegroup_id = AttributeGroupService::GetByName($attributeGroupName)->attributegroup_id;
        $attribute->name = $name;
        if ($attributeUnitName != "-") {
            $attribute->unit_id = UnitService::GetByName($attributeUnitName)->unit_id;
        }
        else
        {
            $attribute->unit_id = null;
        }
        return $attribute;
    }
}