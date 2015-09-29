<?php

require_once __ROOT__.'/application/Service/AttributeService.php';
require_once __ROOT__.'/application/Helper/AttributeHelper.php';
require_once __ROOT__.'/application/Helper/PermissionHelper.php';
require_once __ROOT__.'/application/Helper/AttributeGroupHelper.php';
require_once __ROOT__.'/application/Service/AttributeGroupService.php';
require_once __ROOT__.'/application/Service/AttributeListService.php';
require_once __ROOT__.'/application/Service/UnitService.php';
require_once __ROOT__.'/application/ViewModel/AttributeFloatCreateViewModel.php';
require_once __ROOT__.'/application/ViewModel/AttributeFloatEditViewModel.php';
require_once __ROOT__.'/application/ViewModel/AttributeListEditViewModel.php';

class Controller_Attribute extends Controller
{
    public function action_item()
    {
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
        $attribute->type=1;
        $attribute->status = "1";
        if ($attributeUnitName != "-") {
            $attribute->unit_id = UnitService::GetByName($attributeUnitName)->unit_id;
        }
        AttributeService::Create($attribute);
        header("Location: /Attribute/Item");
    }
    public function action_CreateList()
    {
        $model = new AttributeFloatCreateViewModel();
        $model->attributeGroups = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $model->units = UnitService::GetAll();
        $this->view->generate('/Attribute/CreateList_view.php', 'template_view.php', $model);
    }

    public function action_newList()
    {
        $name = $_POST['inputName'];
        $attributeGroupName = $_POST['inputGroup'];
        $attributeUnitName = $_POST['inputUnit'];
        $attributeValue = explode("\r\n", $_POST['inputValue']);
        $attribute = new Attribute();
        $attribute->attributegroup_id = AttributeGroupService::GetByName($attributeGroupName)->attributegroup_id;
        $attribute->name = $name;
        $attribute->type=2;
        $attribute->status = "1";
        if ($attributeUnitName != "-") {
            $attribute->unit_id = UnitService::GetByName($attributeUnitName)->unit_id;
        }
        AttributeService::Create($attribute);
        $id = AttributeService::GetByName($name)->attribute_id;
        for ($i=0;$i<count($attributeValue);$i++)
        {
            $attributeList = new AttributeList();
            $attributeList->attribute_id = $id;
            $attributeList->name = $attributeValue[$i];
            AttributeListService::Create($attributeList);
        }
        header("Location: /Attribute/Item");
    }
    public function action_EditFloat()
    {
        $id = $_GET['id'];
        $attribute = AttributeService::GetById($id);
        $model = new AttributeFloatEditViewModel();
        $model->id=$id;
        $model->attributeGroups = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $model->units = UnitService::GetAll();
        $model->name = $attribute->name;
        $model->attributeGroupName = AttributeGroupService::GetById($attribute->attributegroup_id)->name;
        $model->unitName = UnitService::GetById($attribute->unit_id)->name;
         $this->view->generate('/Attribute/EditFloat_view.php', 'template_view.php', $model);
    }
    public function action_EditList()
    {
        $id = $_GET['id'];
        $attribute = AttributeService::GetById($id);
        $model = new AttributeListEditViewModel();
        $model->id=$id;
        $model->attributeGroups = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $model->units = UnitService::GetAll();
        $model->name = $attribute->name;
        $model->attributeGroupName = AttributeGroupService::GetById($attribute->attributegroup_id)->name;
        $model->unitName = UnitService::GetById($attribute->unit_id)->name;
        $model->values = AttributeListService::GetValuesByAttributeId($id);
        $this->view->generate('/Attribute/EditList_view.php', 'template_view.php', $model);
    }
    public function action_UpdateFloat()
    {
        $id = $_POST['id'];
        $attribute = AttributeHelper::PopulateAttributeFromEditModel($id,$_POST['inputName'], $_POST['inputGroup'],
            $_POST['inputUnit'] );
        AttributeService::Save($attribute);
        header("Location: /Attribute/Item");
    }
    public function action_DetailList()
    {
        $id = $_GET['id'];
        $attribute = AttributeService::GetById($id);
        $model = new AttributeListEditViewModel();
        $model->id=$id;
        $model->attributeGroups = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $model->units = UnitService::GetAll();
        $model->name = $attribute->name;
        $model->attributeGroupName = AttributeGroupService::GetById($attribute->attributegroup_id)->name;
        $model->unitName = UnitService::GetById($attribute->unit_id)->name;
        $model->values = AttributeListService::GetValuesByAttributeId($id);
        $this->view->generate('/Attribute/DetailList_view.php', 'template_view.php', $model);
    }
    public function action_DetailFloat()
    {
        $id = $_GET['id'];
        $attribute = AttributeService::GetById($id);
        $model = new AttributeFloatEditViewModel();
        $model->id=$id;
        $model->attributeGroups = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $model->units = UnitService::GetAll();
        $model->name = $attribute->name;
        $model->attributeGroupName = AttributeGroupService::GetById($attribute->attributegroup_id)->name;
        $model->unitName = UnitService::GetById($attribute->unit_id)->name;
        $this->view->generate('/Attribute/DetailFloat_view.php', 'template_view.php', $model);
    }
    public function GetIndexFromArray($attribute,$attributes)
    {
        for($i=0;$i<count($attributes);$i++)
        {
            if($attribute == $attributes[$i])
            {
                return $i;
            }
        }
        return -1;

    }
    public function action_UpdateList()
    {
        $id = $_POST['id'];
        $attributeValue = explode("\r\n", $_POST['inputValue']);
        $attribute = AttributeHelper::PopulateAttributeFromEditModel($id,$_POST['inputName'],$_POST['inputGroup'],
            $_POST['inputUnit']);
        AttributeService::Save($attribute);
        $attributesList = AttributeListService::GetByAttributeId($id);
        for ($i=0;$i<count($attributesList);$i++)
        {
            if(($index=$this->GetIndexFromArray($attributesList[$i]->name,$attributeValue))<0)
            {
                AttributeListService::Delete($attributesList[$i]);
            }
            else
            {
                array_splice($attributeValue, $index, 1);
            }
        }
        for ($i=0;$i<count($attributeValue);$i++)
        {
            $attributeList = new AttributeList();
            $attributeList->attribute_id = $id;
            $attributeList->name = $attributeValue[$i];
            AttributeListService::Create($attributeList);
        }
        header("Location: /Attribute/Item");
    }
    public function action_RemoveGroup()
    {
        $id = $_GET['id'];
        $attributeGroup = AttributeGroupService::GetById($id);
        AttributeGroupService::Delete($attributeGroup);
        header("Location: /Attribute/ItemGroup");
    }
    public function action_Remove()
    {
        $id = $_GET['id'];
        AttributeService::Delete(AttributeService::GetById($id));
        header("Location: /Attribute/Item");
    }
}