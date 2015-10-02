<?php

require_once __ROOT__.'/application/Helper/AttributeGroupHelper.php';
require_once __ROOT__.'/application/Service/AttributeGroupService.php';

class Controller_AttributeGroup extends Controller
{
    public function action_Item()
    {
        PermissionHelper::Verification('Editor');
        $model = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $this->view->generate('/AttributeGroup/item_view.php', 'template_view.php', $model);
    }

    public function action_Create()
    {
        PermissionHelper::Verification('Editor');
        $this->view->generate('/AttributeGroup/Create_view.php', 'template_view.php');
    }

    public function action_new()
    {
        PermissionHelper::Verification('Editor');
        $name = $_POST['inputName'];
        $attribute = new AttributeGroup();
        $attribute->name = $name;
        AttributeGroupService::Create($attribute);
        header("Location: /AttributeGroup/Item");
    }
    function action_Edit()
    {
        PermissionHelper::Verification('Editor');
        $group_id = $_GET['id'];
        $model = AttributeGroupHelper::PopulateAttributeGroupViewModel(AttributeGroupService::GetById($group_id));
        $this->view->generate('/AttributeGroup/edit_view.php', 'template_view.php',$model);
    }
    function action_Update()
    {
        PermissionHelper::Verification('Editor');
        $group_id = $_POST['id'];
        $group_name = $_POST['inputName'];
        $group = SectionService::GetById($group_id);
        $group->name = $group_name;
        AttributeGroupService::Save($group);
        header("Location: /AttributeGroup/Item");
    }
    function action_detail()
    {
        PermissionHelper::Verification('Editor');
        $group_id = $_GET['id'];
        $model = AttributeGroupHelper::PopulateAttributeGroupViewModel(AttributeGroupService::GetById($group_id));
        $this->view->generate('/AttributeGroup/detail_view.php', 'template_view.php',$model);
    }
    function action_Remove()
    {
        PermissionHelper::Verification('Editor');
        $group_id = $_GET['id'];
        $group = AttributeGroupService::GetById($group_id);
        AttributeGroupService::Delete($group);
        header("Location: /AttributeGroup/item");
    }
}