<?php
require_once __ROOT__ . '/application/Service/UserService.php';
require_once __ROOT__ . '/application/Service/PermissionService.php';
require_once __ROOT__ . '/application/Service/RolePermissionService.php';
require_once __ROOT__ . '/application/Service/UserService.php';
require_once __ROOT__ . '/application/Service/UserRoleService.php';

class PermissionHelper
{
    public static function Verification($account_name, $permission_name, $crud)
    {
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
            if(!$res)
            {
                header('Location: /account/permission');
            }
        }
    }

    private static function setPermissionFlag($crud, $permmision)
    {
        return $crud * $permmision;
    }
    /*
public override void OnAuthorization(AuthorizationContext context)
    {
        var account = AccountService.GetByName(context.HttpContext.User.Identity.Name,
            true);
        if (account != null)
        {
            var roles = RoleService.GetByUser(account.Id);
            if (roles.Any(r => r.RolePermissions
        .Any(rp => rp.PermissionId == permission.Id &&
        RolePermissionService.HasAccess(rp, crud))))
           return;
        }
        context.Result = new RedirectResult("../Account/LogOn");
    }*/
}