<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 21.09.2015
 * Time: 12:35
 */
class OrderList extends ActiveRecord\Model
{
    public static $table_name='orderlist';
    public static $primary_key='orderlist_id';
    public static $belongs_to=array(array('order'),array('product'));
}