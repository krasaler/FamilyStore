<?php

class AttributeGroupService
{
    public static function GetAll()
    {
        return AttributeGroup::find('all');
    }
    public static function GetById($attributeGroupId)
    {
        return AttributeGroup::find(array('attributegroup_id'=>$attributeGroupId));
    }
    public static function GetByName($attributeGroupName)
    {
        return AttributeGroup::find(array('name'=>$attributeGroupName));
    }
    public static function Save($attributeGroup)
    {
        $attributeGroup->save();
    }
    public static function Create($attributeGroup)
    {
        AttributeGroup::create(array(
            'name' => $attributeGroup->name
        ));
    }
    public static function Delete($attributeGroup)
    {
        $attributeGroup->delete();
    }
}