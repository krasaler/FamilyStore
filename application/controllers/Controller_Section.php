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
        $this->view->generate('/Section/create_view.php', 'template_view.php');
    }
    function action_new()
    {
        $name = $_POST['inputName'];
        $section = new Section();
        $section->section_name = $name;
        SectionService::Create($section);
        header("Location: /Section/Item");
    }
    function action_Edit()
    {
        $section_id = $_GET['id'];
        $model = SectionHelper::PopulateSectionViewModel(SectionService::GetById($section_id));
        $this->view->generate('/Section/edit_view.php', 'template_view.php',$model);
    }
    function action_Update()
    {
        $section_id = $_POST['id'];
        $section_name = $_POST['inputName'];
        $section = SectionService::GetById($section_id);
        $section->section_name = $section_name;
        SectionService::Save($section);
        header("Location: /Section/Item");
    }
    function action_Item()
    {
        $model = SectionHelper::PopulateSectionViewModelList(SectionService::GetAll());
        $this->view->generate('/Section/item_view.php', 'template_view.php',$model);
    }

    function action_detail()
    {
        $section_id = $_GET['id'];
        $model = SectionHelper::PopulateSectionViewModel(SectionService::GetById($section_id));
        $this->view->generate('/Section/detail_view.php', 'template_view.php',$model);
    }
    function action_Remove()
    {
        $section_id = $_GET['id'];
        $section = SectionService::GetById($section_id);
        CatalogueService::Delete($section);
        header("Location: /section/item");
    }
}