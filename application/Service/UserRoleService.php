<?php
require_once __ROOT__.'/application/Service/RoleService.php';
require_once __ROOT__.'/application/Service/UserService.php';
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
    public static function CheckAdmin($userName)
    {
        $userrole = UserRole::find('all',array('user_id'=>UserService::GetByName($userName)->user_id,
            'role_id'=>RoleService::GetByName('Admin')->role_id
        ));
        if(count($userrole)>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}