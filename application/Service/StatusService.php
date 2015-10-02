<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 02.10.2015
 * Time: 16:52
 */
class StatusService
{
    public static function GetAll()
    {
        return Statusorder::find('all');
    }
    public static function GetById($statusorderId)
    {
        return Statusorder::find(array('statusorder_id'=>$statusorderId));
    }
    public static function GetByName($statusName)
    {
        return Statusorder::find(array('name'=>$statusName));
    }
    public static function Save($status)
    {
        $status->save();
    }
    public static function Create($status)
    {
        Statusorder::create(array(
            'name' => $status->name
        ));
    }
    public static function Delete($status)
    {
        $status->delete();
    }
}