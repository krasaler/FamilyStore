<?php

class Order extends ActiveRecord\Model
{
    public static $table_name = 'orders';
    public static $primary_key = 'order_id';
    public static $belongs_to = array(array('account'), array('statusorder'), array('branch'));
}