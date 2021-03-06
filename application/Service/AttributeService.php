<?php

class AttributeService
{
    public static function GetAll()
    {
        return Attribute::find('all');
    }
    public static function GetById($attributeId)
    {
        return Attribute::find(array('attribute_id'=>$attributeId));
    }
    public static function GetByName($attributeName)
    {
        return Attribute::find(array('name'=>$attributeName));
    }
    public static function Save($attribute)
    {
        $attribute->save();
    }
    public static function Create($attribute)
    {
        Attribute::create(array(
            'name' => $attribute->name,
            'attributegroup_id' => $attribute->attributegroup_id,
            'type' => $attribute->type,
            'unit_id' => $attribute->unit_id,
            'status' => $attribute->status
        ));
    }
    public static function Delete($attribute)
    {
        $attribute->delete();
    }
}