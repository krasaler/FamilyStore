<?php

require_once __ROOT__.'/application/ViewModel/CatalogViewModel.php';
require_once __ROOT__.'/application/Service/CatalogueService.php';
require_once __ROOT__.'/application/Service/ProductService.php';
class CatalogueHelper
{
    public static function PopulateCatalogueViewModel($catalogue)
    {
        $model = new CatalogViewModel();
        $model->id = $catalogue->catalogue_id;
        $model->name = $catalogue->name;
        $model->section = $catalogue->section->section_name;
        $model->products = ProductService::GetByCatalogue($model->name);
        return $model;
    }

    public static function PopulateCatalogueViewModelList($catalogues)
    {
        for ($i=0;$i<count($catalogues);$i++)
        {
            $models[$i] = CatalogueHelper::PopulateCatalogueViewModel($catalogues[$i]);
        }
        return $models;

    }
}