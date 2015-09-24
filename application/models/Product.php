<?php

class Product extends ActiveRecord\Model
{
    public static $table_name='product';
    public static $primary_key='product_id';

    public static $belongs_to = array(array('catalogue'));
}