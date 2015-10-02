<?php
require_once __ROOT__.'/application/Service/RoleService.php';
require_once __ROOT__.'/application/Service/UserService.php';
class UserRoleService
{
    public static function GetAll()
    {
        return UserRole::find('all');
    }

    public static function GetById($userroleId)
    {
        return UserRole::find(array('userrole_id' => $userroleId));
    }

    public static function GetByUserId($userId)
    {
        return UserRole::find('all', array('user_id' => $userId));
    }

    public static function GetByRoleId($roleId)
    {
        return UserRole::find('all', array('role_id' => $roleId));
    }

    public static function Delete($userrole)
    {
        $userrole->delete();
    }

    public static function Create($userRole)
    {
        UserRole::create(['user_id' => $userRole->user_id,
            'role_id' => $userRole->role_id]);
    }

    public static function Save($userRole)
    {
        $userRole->Save();
    }
}