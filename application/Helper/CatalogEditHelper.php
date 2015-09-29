<?php

require_once __ROOT__.'/application/ViewModel/CatalogEditViewModel.php';
require_once __ROOT__.'/application/Service/CatalogueService.php';
require_once __ROOT__.'/application/Service/CatalogueAttributeService.php';
require_once __ROOT__.'/application/Service/AttributeService.php';
require_once __ROOT__.'/application/Helper/AttributeHelper.php';
require_once __ROOT__.'/application/Service/AttributeGroupService.php';
require_once __ROOT__.'/application/Helper/AttributeGroupHelper.php';

class CatalogEditHelper
{
    public static function PopulateCatalogueEditViewModel($catalogue)
    {
        $model = new CatalogEditViewModel();
        $model->id = $catalogue->catalogue_id;
        $model->name = $catalogue->name;
        $model->section_name = $catalogue->section->section_name;
        $attributes = AttributeHelper::PopulateAttributeViewModelList(
            CatalogueAttributeService::GetAttributesByCatalogueId($catalogue->catalogue_id));
        $model->attributes = AttributeGroupHelper::PopulateAttributeGroupViewModelList(AttributeGroupService::GetAll());
        $model->group[][]="";
        for ($i = 0; $i < count($model->attributes); $i++) {
            for ($j = 0; $j < count($model->attributes[$i]->attributes); $j++) {
                if (($index = CatalogEditHelper::GetIndexFromArray($model->attributes[$i]->attributes[$j], $attributes)) >= 0) {
                    $model->group[$i][$j] = 'checked';
                }
                else
                {
                    $model->group[$i][$j] = '';
                }
            }
        }
        return $model;
    }
    public static function GetIndexFromArray($attribute,$attributes)
    {
        for($i=0;$i<count($attributes);$i++)
        {
            if($attribute->id == $attributes[$i]->id)
            {
                return $i;
            }
        }
        return -1;

    }
    public static function PopulateCatalogueEditViewModelList($catalogues)
    {
        for ($i=0;$i<count($catalogues);$i++)
        {
            $models[$i] = CatalogEditHelper::PopulateCatalogueEditViewModel($catalogues[$i]);
        }
        return $models;

    }
}