<?php

require_once __ROOT__ . '/application/Service/SectionService.php';
require_once __ROOT__.'/application/Helper/SectionHelper.php';
class Controller_Section extends Controller
{
    function  action_index()
    {
        parent::action_index();
    }

    function action_Create()
    {
        PermissionHelper::Verification('Editor');
        $this->view->generate('/Section/create_view.php', 'template_view.php');
    }
    function action_new()
    {
        PermissionHelper::Verification('Editor');
        $name = $_POST['inputName'];
        $section = new Section();
        $section->section_name = $name;
        SectionService::Create($section);
        header("Location: /Section/Item");
    }
    function action_Edit()
    {
        PermissionHelper::Verification('Editor');
        $section_id = $_GET['id'];
        $model = SectionHelper::PopulateSectionViewModel(SectionService::GetById($section_id));
        $this->view->generate('/Section/edit_view.php', 'template_view.php',$model);
    }
    function action_Update()
    {
        PermissionHelper::Verification('Editor');
        $section_id = $_POST['id'];
        $section_name = $_POST['inputName'];
        $section = SectionService::GetById($section_id);
        $section->section_name = $section_name;
        SectionService::Save($section);
        header("Location: /Section/Item");
    }
    function action_Item()
    {
        PermissionHelper::Verification('Editor');
        $model = SectionHelper::PopulateSectionViewModelList(SectionService::GetAll());
        $this->view->generate('/Section/item_view.php', 'template_view.php',$model);
    }

    function action_detail()
    {
        PermissionHelper::Verification('Editor');
        $section_id = $_GET['id'];
        $model = SectionHelper::PopulateSectionViewModel(SectionService::GetById($section_id));
        $this->view->generate('/Section/detail_view.php', 'template_view.php',$model);
    }
    function action_Remove()
    {
        PermissionHelper::Verification('Editor');
        $section_id = $_GET['id'];
        $section = SectionService::GetById($section_id);
        CatalogueService::Delete($section);
        header("Location: /section/item");
    }
}