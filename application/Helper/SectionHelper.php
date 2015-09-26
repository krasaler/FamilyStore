<?php

require_once __ROOT__.'/application/ViewModel/SectionViewModel.php';
require_once __ROOT__.'/application/Service/CatalogueService.php';
require_once __ROOT__.'/application/Helper/CatalogueHelper.php';
class SectionHelper
{
    public static function PopulateSectionViewModel($section)
    {
        $model = new SectionViewModel();
        $model->id = $section->section_id;
        $model->name = $section->section_name;
        $model->catalogues = CatalogueHelper::PopulateCatalogueViewModelList($section->catalogues);
        return $model;
    }

    public static function PopulateSectionViewModelList($sections)
    {
        for ($i=0;$i<count($sections);$i++)
        {
            $models[$i] = SectionHelper::PopulateSectionViewModel($sections[$i]);
        }
        return $models;

    }
}