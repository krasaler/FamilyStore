<?php

class CatalogueService
{
    public static function GetAll()
    {
        return Catalogue::find('all');
    }
    public static function GetById($catalogueId)
    {
        return Catalogue::find(array('catalogue_id'=>$catalogueId));
    }
    public static function GetByName($catalogueName)
    {
        return Catalogue::find(array('name'=>$catalogueName));
    }
    public static function Save($catalogue)
    {
        $catalogue->save();
    }
    public static function Create($catalogue)
    {
        Catalogue::create(array(
            'name' => $catalogue->name
        ));
    }
    public static function Delete($catalogue)
    {
        $catalogue->delete();
    }
}