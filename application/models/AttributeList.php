<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 20.09.2015
 * Time: 18:34
 */
class AttributeList extends ActiveRecord\Model
{
    public static $table_name='attributelist';
    public static $primary_key='attributelist_id';
    public static $belongs_to=array(array('attribute'));
}