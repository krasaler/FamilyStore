<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 20.09.2015
 * Time: 20:06
 */
class AttributeValueList extends ActiveRecord\Model
{
    public static $table_name='attributevaluelist';
    public static $primary_key='attributevaluelist_id';
    public static $belongs_to=array(array('product'),array('attribute'),array('value','class_name' => 'AttributeList'));
}