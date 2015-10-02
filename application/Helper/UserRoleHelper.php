<?php

require_once __ROOT__.'/application/ViewModel/UserRoleViewModel.php';
require_once __ROOT__.'/application/ViewModel/UserRoleCreateViewModel.php';
require_once __ROOT__.'/application/Service/UserService.php';
require_once __ROOT__.'/application/Service/RoleService.php';
class UserRoleHelper
{
    public static function PopulateUserRoleViewModel($userRole)
    {
        $model = new UserRoleViewModel();
        $model->id = $userRole->userrole_id;
        $model->account = UserService::GetById($userRole->user_id);
        $model->role = RoleService::GetById($userRole->role_id);
        return $model;
    }
    public static function PopulateUserRoleViewModelList($userRoles)
    {
        for($i=0;$i<count($userRoles);$i++)
        {
            $model[$i] = UserRoleHelper::PopulateUserRoleViewModel($userRoles[$i]);
        }
        return $model;
    }
    public static function PopulateUserRoleCreateViewModel($userRole)
    {
        $model = new UserRoleCreateViewModel();
        $model->id = $userRole->userrole_id;
        $model->user = UserService::GetById($userRole->user_id);
        $model->role = RoleService::GetById($userRole->role_id);
        $model->users = UserService::GetAll();
        $model->roles = RoleService::GetAll();
        return $model;
    }
}