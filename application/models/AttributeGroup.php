<?php

class AttributeGroup extends ActiveRecord\Model
{
    public static $table_name='attributegroup';
    public static $primary_key='attributegroup_id';
    static $has_many = array(
        array('attributes')
    );
}