<?php

class AttributeListService
{
    public static function GetAll()
    {
        return AttributeList::find('all');
    }
    public static function  GetById($attributeListId)
    {
        return AttributeList::find(array('attributelist_id'=>$attributeListId));
    }
    public static function GetByAttributeId($attributeId)
    {
        return AttributeList::find('all',array('attribute_id'=>$attributeId));
    }
    public static function GetValuesByAttributeId($attributeId)
    {
        $attributeslist = AttributeListService::GetByAttributeId($attributeId);
        for($i=0;$i<count($attributeslist);$i++)
        {
            $values[$i] = $attributeslist[$i]->name;
        }
        return $values;
    }
    public static function Save($attribute)
    {
        $attribute->save();
    }
    public static function Create($attribute)
    {
        AttributeList::create(array(
            'attribute_id' => $attribute->attribute_id,
            'name' => $attribute->name
        ));
    }
    public static function Delete($attribute)
    {
        $attribute->delete();
    }
}