<?php


class AttributeValueFloatService
{
    public static function GetAll()
    {
        return AttributeValueFloat::find('all');
    }
    public static function GetByProductId($productId)
    {
        return AttributeValueFloat::find('all',array('product_id'=>$productId));
    }
    public static function GetByProductIdAndAttributeId($productId,$attributeId)
    {
        return AttributeValueFloat::find(['product_id'=>$productId,'attribute_id'=>$attributeId]);
    }
    public static function Save($attribute)
    {
        $attribute->save();
    }
    public static function Create($attribute)
    {
        AttributeValueFloat::create(array(
            'product_id'=>$attribute->product_id,
            'attribute_id'=>$attribute->attribute_id,
            'value' => $attribute->value
        ));
    }
    public static function Delete($attribute)
    {
        $attribute->delete();
    }
}