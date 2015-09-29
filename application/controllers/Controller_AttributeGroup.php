<?php

require_once __ROOT__.'/application/Helper/AttributeGroupHelper.php';
require_once __ROOT__.'/application/Service/AttributeGroupService.php';

class Controller_AttributeGroup extends Controller
{
    public function action_Item()
    {
        $model = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $this->view->generate('/AttributeGroup/item_view.php', 'template_view.php', $model);
    }

    public function action_Create()
    {
        $this->view->generate('/AttributeGroup/Create_view.php', 'template_view.php');
    }

    public function action_new()
    {
        $name = $_POST['inputName'];
        $attribute = new AttributeGroup();
        $attribute->name = $name;
        AttributeGroupService::Create($attribute);
        header("Location: /AttributeGroup/Item");
    }
    function action_Edit()
    {
        $group_id = $_GET['id'];
        $model = AttributeGroupHelper::PopulateAttributeGroupViewModel(AttributeGroupService::GetById($group_id));
        $this->view->generate('/AttributeGroup/edit_view.php', 'template_view.php',$model);
    }
    function action_Update()
    {
        $group_id = $_POST['id'];
        $group_name = $_POST['inputName'];
        $group = SectionService::GetById($group_id);
        $group->name = $group_name;
        AttributeGroupService::Save($group);
        header("Location: /AttributeGroup/Item");
    }
    function action_detail()
    {
        $group_id = $_GET['id'];
        $model = AttributeGroupHelper::PopulateAttributeGroupViewModel(AttributeGroupService::GetById($group_id));
        $this->view->generate('/AttributeGroup/detail_view.php', 'template_view.php',$model);
    }
    function action_Remove()
    {
        $group_id = $_GET['id'];
        $group = AttributeGroupService::GetById($group_id);
        AttributeGroupService::Delete($group);
        header("Location: /AttributeGroup/item");
    }
}