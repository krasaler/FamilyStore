<?php

class UserRole extends ActiveRecord\Model
{
    public static $table_name='userrole';
    public static $primary_key='userrole_id';
    public static $belongs_to=array(array('role'),array('user'));
}