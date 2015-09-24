<?php

class PermissionService
{
    public static function GetAll()
    {
        return Permission::find('all');
    }
    public static function GetById($permissionId)
    {
        return Permission::find(array('permission_id'=>$permissionId));
    }
    public static function GetByName($permissionName)
    {
        return Permission::find(array('name'=>$permissionName));
    }
    public static function Save($permission)
    {
        return $permission->save();
    }
    public static function Create($permission)
    {
        return Permission::create(array(
            'name' => $permission->user_name
        ));
    }
    public static function Delete($permission)
    {
        $permission->delete();
    }
}