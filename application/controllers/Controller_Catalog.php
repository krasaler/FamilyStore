<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/AttributeGroupHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/CatalogDetailHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/CatalogEditHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/AccountService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/ReviewService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/AttributeGroupService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/CatalogueService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/SectionService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/AttributeService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/CatalogueAttributeService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/SectionService.php';

class Controller_Catalog extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function action_Item()
    {
        $model = CatalogueHelper::PopulateCatalogueViewModelList(CatalogueService::GetAll());
        $this->view->generate('/Catalog/item_view.php', 'template_view.php', $model);
    }

    function action_Create()
    {
        $model = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $this->view->generate('/Catalog/create_view.php', 'template_view.php', $model);
    }
    function action_Edit()
    {
        $catalog_id = $_GET['id'];
        $model = CatalogEditHelper::PopulateCatalogueEditViewModel(CatalogueService::GetById($catalog_id));
        $this->view->generate('/Catalog/edit_view.php', 'template_view.php', $model);
    }

    function action_Update()
    {
        $catalogue_id = $_POST['id'];
        $name = $_POST['inputName'];
        $sectionName = $_POST['inputSection'];
        $attribute = $_POST['attributes'];
        $catalogue =CatalogueService::GetById($catalogue_id);
        $catalogue->name = $name;
        $catalogue->section_id = SectionService::GetByName($sectionName)->section_id;
        CatalogueService::Save($catalogue);
        $catalogue = CatalogueService::GetById($catalogue_id);
        $catalogueAttribute = CatalogueAttributeService::GetByCatalogueId($catalogue_id);
        for($i=0;$i<count($catalogueAttribute);$i++)
        {
            CatalogueAttributeService::Delete($catalogueAttribute[$i]);
        }
        for ($i = 0; $i < count($attribute); $i++) {
            $value = new CatalogueAttribute();
            $value->catalogue_id = $catalogue_id;
            $value->attribute_id = trim($attribute[$i]);
            CatalogueAttributeService::Create($value);
        }
        header("Location: /Catalog/Item");
    }

    function action_Detail()
    {
        $catalog_id = $_GET['id'];
        $model = CatalogDetailHelper::PopulateCatalogueDetailViewModel(CatalogueService::GetById($catalog_id));
        $this->view->generate("/Catalog/detail_view.php",'template_view.php',$model);
    }

    function action_Remove()
    {
        $catalog_id = $_GET['id'];
        $catalogue = CatalogueService::GetById($catalog_id);
        CatalogueService::Delete($catalogue);
        header("Location: /catalog/item");
    }


    function action_new()
    {
        $name = $_POST['inputName'];
        $sectionName = $_POST['inputSection'];
        $attribute = $_POST['attributes'];
        $catalogue = new Catalogue();
        $catalogue->name = $name;
        $catalogue->section_id = SectionService::GetByName($sectionName)->section_id;
        CatalogueService::Create($catalogue);
        $catalogue = CatalogueService::GetByName($name);
        for ($i = 0; $i < count($attribute); $i++) {
            $value = new CatalogueAttribute();
            $value->catalogue_id = $catalogue->catalogue_id;
            $value->attribute_id = AttributeService::GetByName(trim($attribute[$i]))->attribute_id;
            CatalogueAttributeService::Create($value);
        }
        header("Location: /Catalog/Item");
    }




}