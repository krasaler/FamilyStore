<?php

require_once __ROOT__.'/application/Service/UserRoleService.php';
require_once __ROOT__.'/application/Helper/UserRoleHelper.php';
require_once __ROOT__.'/application/Service/UserService.php';
require_once __ROOT__.'/application/Service/RoleService.php';
class Controller_Role extends Controller
{
    public function action_item()
    {
        PermissionHelper::Verification('Editor');
        $model = UserRoleHelper::PopulateUserRoleViewModelList(UserRoleService::GetAll());
        $this->view->generate('/Role/item_view.php', 'template_view.php',$model);
    }
    public function action_remove()
    {
        PermissionHelper::Verification('Editor');
        $id = $_GET['id'];
        $userRole = UserRoleService::GetById($id);
        UserRoleService::Delete($userRole);
        header('Location: /Role/item');
    }
    public function action_Edit()
    {
        PermissionHelper::Verification('Editor');
        $id = $_GET['id'];
        $model = UserRoleHelper::PopulateUserRoleCreateViewModel(UserRoleService::GetById($id));
        $this->view->generate('/Role/edit_view.php', 'template_view.php',$model);
    }
    public function action_update()
    {
        PermissionHelper::Verification('Editor');
        $id = $_POST['id'];
        $roleName = $_POST['roleName'];
        $userName = $_POST['userName'];
        $model = UserRoleService::GetById($id);
        $model->user_id = UserService::GetByName($userName)->user_id;
        $model->role_id = RoleService::GetByName($roleName)->role_id;
        UserRoleService::Save($model);
        header('Location: /Role/item');
    }
    public function action_Create()
    {
        PermissionHelper::Verification('Editor');
        $id = $_GET['id'];
        $model = UserRoleHelper::PopulateUserRoleCreateViewModel(UserRoleService::GetById($id));
        $this->view->generate('/Role/Create_view.php', 'template_view.php',$model);
    }
    public function action_new()
    {
        PermissionHelper::Verification('Editor');
        $roleName = $_POST['roleName'];
        $userName = $_POST['userName'];
        $model = new UserRole();
        $model->user_id = UserService::GetByName($userName)->user_id;
        $model->role_id = RoleService::GetByName($roleName)->role_id;
        UserRoleService::Create($model);
        header('Location: /Role/item');
    }
}