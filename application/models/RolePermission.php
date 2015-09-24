<?php

class RolePermission extends ActiveRecord\Model
{
    public static $table_name='rolepermission';
    public static $primary_key='rolepermission_id';
    public static $belongs_to=array(array('role'),array('permission'));
}