<?php

class Permission
{
    private $required;
    private $permission;
    private $crud;
    public function __construct($required,$crud=__CanRead__)
    {
        $this->required = $required;
        $this->permission = PermissionService::GetByName($required);
        $this->crud = $crud;
    }

    public function OnAuth($account_name)
    {
        $account = AccountService::GetByName($account_name,true);
        if(is_null($account))
        {
            $roles = RoleService::
        }
    }/*
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