<?php

class UnitService
{
    public static function GetAll()
    {
        return Unit::find('all');
    }
    public static function GetById($unitId)
    {
        return Unit::find(array('unit_id'=>$unitId));
    }
    public static function GetByName($unitName)
    {
        return Unit::find(array('name'=>$unitName));
    }
    public static function Save($unit)
    {
        $unit->save();
    }
    public static function Create($unit)
    {
        Unit::create(array(
            'name' => $unit->name
        ));
    }
    public static function Delete($unit)
    {
        $unit->delete();
    }
}