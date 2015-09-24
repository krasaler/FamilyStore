<?php

class RoleService
{
    public static function GetAll()
    {
        return Role::find('all');
    }
    public static function GetById($roleId)
    {
        return Role::find(array('role_id'=>$roleId));
    }
    public static function GetByName($roleName)
    {
        return Role::find(array('role_name'=>$roleName));
    }
    public static function Save($role)
    {
        return $role->save();
    }
    public static function Create($role)
    {
        return Role::create(array(
            'role_name' => $role->role_name,
            'description' => $role->description,
        ));
    }
    public static function Delete($role)
    {
        $role->delete();
    }
}