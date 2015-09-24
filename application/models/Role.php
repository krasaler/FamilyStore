<?php

class Role extends ActiveRecord\Model
{
    public static $table_name='role';
    public static $primary_key='role_id';
    public static $has_many=array(array('users', 'through' => 'UserRole'));
}