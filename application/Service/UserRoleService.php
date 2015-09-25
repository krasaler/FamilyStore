<?php

class UserRoleService
{
    public static function GetAll()
    {
        return UserRole::find('all');
    }
    public static function GetByUserId($userId)
    {
        return UserRole::find('all',array('user_id'=>$userId));
    }
    public static function GetByRoleId($roleId)
    {
        return UserRole::find('all',array('role_id'=>$roleId));
    }
}