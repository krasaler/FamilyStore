<?php

require_once __ROOT__.'/application/ViewModel/CatalogDetailViewModel.php';
require_once __ROOT__.'/application/Service/CatalogueService.php';
require_once __ROOT__.'/application/Service/CatalogueAttributeService.php';
require_once __ROOT__.'/application/Service/AttributeService.php';
require_once __ROOT__.'/application/Helper/AttributeHelper.php';
class CatalogDetailHelper
{
    public static function PopulateCatalogueDetailViewModel($catalogue)
    {
        $model = new CatalogDetailViewModel();
        $model->name = $catalogue->name;
        $model->section_name = $catalogue->section->section_name;
        $attributes = CatalogueAttributeService::GetByCatalogueId($catalogue->catalogue_id);
        for($i=0;$i<count($attributes);$i++)
        {
            $model->attributes[$i] = AttributeHelper::PopulateAttributeViewModel(AttributeService::GetById(
                $attributes[$i]->attribute_id
            ));
        }
        return $model;
    }

    public static function PopulateCatalogueDetailViewModelList($catalogues)
    {
        for ($i=0;$i<count($catalogues);$i++)
        {
            $models[$i] = CatalogDetailHelper::PopulateCatalogueViewModel($catalogues[$i]);
        }
        return $models;

    }
}