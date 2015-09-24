<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 20.09.2015
 * Time: 18:17
 */
class Account extends ActiveRecord\Model
{
    public static $table_name='account';
    public static $primary_key='account_id';
    public static $belongs_to=array(array('user'));
}