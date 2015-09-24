<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 21.09.2015
 * Time: 12:33
 */
class Statusorder extends ActiveRecord\Model
{
    public static $table_name='statusorder';
    public static $primary_key='statusorder_id';
    static $has_many = array(
        array('orders'));
}