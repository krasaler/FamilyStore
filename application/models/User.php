<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 20.09.2015
 * Time: 18:18
 */
class User extends ActiveRecord\Model
{
    public static $table_name='user';
    public static $primary_key='user_id';
    public static $has_many=array(array('roles', 'through' => 'UserRole'));
}