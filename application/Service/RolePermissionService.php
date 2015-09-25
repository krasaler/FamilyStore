<?php


class RolePermissionService
{
    public static function GetAll()
    {
        return RolePermission::find('all');
    }
    public static function GetById($rpId)
    {
        return RolePermission::find(array('rolepermission_id'=>$rpId));
    }
    public static function GetByRoleId($role_id)
    {
        return RolePermission::find('all',array('role_id'=>$role_id));
    }
    public static function GetByRoleIdPermissionId($role_id,$permission_id )
    {
        return RolePermission::find('all',array('role_id'=>$role_id),
            array('permission_id'=>$permission_id)
            );
    }
    public static function GetByPermissionId($permission_id)
    {
        return RolePermission::find('all',array('permission_id'=>$permission_id));
    }
}