<?php

require_once __ROOT__.'/application/Service/AttributeService.php';
require_once __ROOT__.'/application/Helper/AttributeHelper.php';
require_once __ROOT__.'/application/Helper/PermissionHelper.php';
require_once __ROOT__.'/application/Helper/AttributeGroupHelper.php';
require_once __ROOT__.'/application/Service/AttributeGroupService.php';
require_once __ROOT__.'/application/Service/UnitService.php';
require_once __ROOT__.'/application/ViewModel/AttributeFloatCreateViewModel.php';
require_once __ROOT__.'/application/ViewModel/AttributeFloatEditViewModel.php';

class Controller_Attribute extends Controller
{
    public function action_item()
    {
        PermissionHelper::Verification(__Viewer__, __CanCreate__);
        $model = AttributeHelper::PopulateAttributeViewModelList(AttributeService::GetAll());
        $this->view->generate('/Attribute/item_view.php', 'template_view.php', $model);
    }

    public function action_CreateFloat()
    {
        $model = new AttributeFloatCreateViewModel();
        $model->attributeGroups = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $model->units = UnitService::GetAll();
        $this->view->generate('/Attribute/CreateFloat_view.php', 'template_view.php', $model);
    }

    public function action_newFloat()
    {
        $name = $_POST['inputName'];
        $attributeGroupName = $_POST['inputGroup'];
        $attributeUnitName = $_POST['inputUnit'];
        $attribute = new Attribute();
        $attribute->attributegroup_id = AttributeGroupService::GetByName($attributeGroupName)->attributegroup_id;
        $attribute->name = $name;
        $attribute->type = "1";
        $attribute->status = "1";
        if ($attributeUnitName != "-") {
            $attribute->unit_id = UnitService::GetByName($attributeUnitName);
        }
        AttributeService::Create($attribute);
        header("Location: /Attribute/Item");
    }

    public function action_EditFloat()
    {
        $name = $_GET['name'];
        $attribute = AttributeService::GetByName($name);
        $model = new AttributeFloatEditViewModel();
        $model->attributeGroups = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $model->units = UnitService::GetAll();
        $model->name = $attribute->name;
        $model->attributeGroupName = AttributeGroupService::GetById($attribute->attributegroup_id)->name;
        $model->unitName = UnitService::GetById($attribute->unit_id)->name;
         $this->view->generate('/Attribute/EditFloat_view.php', 'template_view.php', $model);
    }
    public  function action_CreateList()
    {
        $this->view->generate('/Attribute/CreateList_view.php', 'template_view.php');
    }
}