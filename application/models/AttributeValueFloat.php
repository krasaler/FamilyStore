<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 20.09.2015
 * Time: 19:04
 */
class AttributeValueFloat extends ActiveRecord\Model
{
    public static $table_name='attributevaluefloat';
    public static $primary_key='attributevaluefloat_id';
    public static $belongs_to=array(array('product'),array('attribute'));


}