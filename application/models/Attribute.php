<?php

class Attribute extends ActiveRecord\Model
{
    public static $table_name='attribute';
    public static $primary_key='attribute_id';
	static $belongs_to = array(
		array('unit'),
		array('AttributeGroup','class_name' => 'AttributeGroup'));
}