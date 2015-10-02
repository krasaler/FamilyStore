<?php


class AttributeValueListService
{
    public static function GetAll()
    {
        return AttributeValueList::find('all');
    }
    public static function GetByAttributeId($attributeId)
    {
        return AttributeValueList::find('all',array('attribute_id'=>$attributeId));
    }
    public static function GetByProductId($productId)
    {
        return AttributeValueList::find('all',array('product_id'=>$productId));
    }
    public static function GetByProductIdAndAttributeId($productId, $attributeId)
    {
        return AttributeValueList::find(['product_id'=>$productId,'attribute_id' => $attributeId]);
    }
    public static function Save($attribute)
    {
        $attribute->save();
    }
    public static function Create($attribute)
    {
        AttributeValueList::create(array(
            'product_id' => $attribute->product_id,
            'attribute_id' => $attribute->attribute_id,
            'value' => $attribute->value
        ));
    }
    public static function Delete($attribute)
    {
        $attribute->delete();
    }
}