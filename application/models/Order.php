<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 21.09.2015
 * Time: 12:31
 */
class Order extends ActiveRecord\Model
{
    public static $table_name = 'orders';
    public static $primary_key = 'order_id';
    public static $belongs_to = array(array('account'), array('statusorder'));
}