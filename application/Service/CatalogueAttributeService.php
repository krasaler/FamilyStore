<?php

require_once __ROOT__.'/application/Service/AttributeService.php';
class CatalogueAttributeService
{
    public static function GetAll()
    {
        return CatalogueAttribute::find('all');
    }
    public static function GetByCatalogueId($catalogueId)
    {
        return CatalogueAttribute::find('all',array('catalogue_id'=>$catalogueId));
    }
    public static function GetAttributesByCatalogueId($catalogueId)
    {
        $cas = CatalogueAttribute::find('all',array('catalogue_id'=>$catalogueId));

        for($i=0;$i<count($cas);$i++)
        {
            $attributes[$i] = AttributeService::GetById($cas[$i]->attribute_id);
        }

        return $attributes;
    }
    public static function Save($catalogueAtribute)
    {
        $catalogueAtribute->save();
    }
    public static function Create($catalogueAtribute)
    {
        return CatalogueAttribute::create(array(
            'catalogue_id' => $catalogueAtribute->catalogue_id,
            'attribute_id' => $catalogueAtribute->attribute_id,
            'vis_mode' => 1,
        ));
    }
    public static function Delete($catalogueAtribute)
    {
        return $catalogueAtribute->delete();
    }
}