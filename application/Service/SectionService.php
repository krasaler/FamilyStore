<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 26.09.2015
 * Time: 14:47
 */
class SectionService
{
    public static function GetAll()
    {
        return Section::find('all');
    }
    public static function GetById($sectionId)
    {
        return Section::find(array('section_id'=>$sectionId));
    }
    public static function GetByName($sectionName)
    {
        return Section::find(array('section_name'=>$sectionName));
    }
    public static function Save($section)
    {
        $section->save();
    }
    public static function Create($section)
    {
        Section::create(array(
            'section_name' => $section->section_name
        ));
    }
    public static function Delete($section)
    {
        $section->delete();
    }
}