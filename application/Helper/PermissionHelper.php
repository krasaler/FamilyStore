<?php
require_once __ROOT__ . '/application/Service/UserService.php';
require_once __ROOT__ . '/application/Service/PermissionService.php';
require_once __ROOT__ . '/application/Service/RolePermissionService.php';
require_once __ROOT__ . '/application/Service/UserService.php';
require_once __ROOT__ . '/application/Service/UserRoleService.php';
require_once __ROOT__ . '/application/Service/AccountService.php';

class PermissionHelper
{
    public static function VerificationBool($permission_name, $crud = __CanRead__)
    {
        session_start();
        $account_name = $_SESSION['login'];
        $res=false;
        if (!is_null($account_name)) {
            $account = AccountService::GetByName($account_name, true);

            if (!is_null($account)) {
                $roles = UserRoleService::GetByUserId($account->account_id);
                $permission = PermissionService::GetByName($permission_name);
                $res = false;
                for ($i = 0; $i < count($roles); $i++) {
                    $rps = RolePermissionService::GetByRoleIdPermissionId($roles[$i]->role_id, $permission->permission_id);
                    foreach ($rps as $value) {
                        $rr = PermissionHelper::setPermissionFlag(__CanCreate__, $value->cancreate) |
                            PermissionHelper::setPermissionFlag(__CanRead__, $value->canread) |
                            PermissionHelper::setPermissionFlag(__CanUpdate__, $value->canupdate) |
                            PermissionHelper::setPermissionFlag(__CanRemove__, $value->canremove);
                        if (($rr & $crud) == $crud) {
                            $res = true;
                        }


                    }
                }
            }
        }
        return $res;

    }
    public static function Verification($permission_name, $crud = __CanRead__)
    {
        session_start();
        $account_name = $_SESSION['login'];
        if (!is_null($account_name)) {
            $account = AccountService::GetByName($account_name, true);

            if (!is_null($account)) {
                $roles = UserRoleService::GetByUserId($account->account_id);
                $permission = PermissionService::GetByName($permission_name);
                $res = false;
                for ($i = 0; $i < count($roles); $i++) {
                    $rps = RolePermissionService::GetByRoleIdPermissionId($roles[$i]->role_id, $permission->permission_id);
                    foreach ($rps as $value) {
                        $rr = PermissionHelper::setPermissionFlag(__CanCreate__, $value->cancreate) |
                            PermissionHelper::setPermissionFlag(__CanRead__, $value->canread) |
                            PermissionHelper::setPermissionFlag(__CanUpdate__, $value->canupdate) |
                            PermissionHelper::setPermissionFlag(__CanRemove__, $value->canremove);
                        if (($rr & $crud) == $crud) {
                            $res = true;
                        }


                    }
                }
            }
        }
        else {
            header('Location: /account/permission');
        }
        if (!$res) {
            header('Location: /account/permission');
        }

    }

private static function setPermissionFlag($crud, $permmision)
{
    return $crud * $permmision;
}
}