<?php

class BranchService
{
    public static function GetAll()
    {
        return Branch::find('all');
    }
    public static function GetById($branchId)
    {
        return Branch::find(array('branch_id'=>$branchId));
    }
    public static function GetByName($branchName)
    {
        return Branch::find(array('name'=>$branchName));
    }
    public static function GetByAddress($branchAddress)
    {
        return Branch::find(array('address'=>$branchAddress));
    }
    public static function Save($branch)
    {
        $branch->save();
    }
    public static function Create($branch)
    {
        return Branch::create(array(
            'name' => $branch->name,
            'address' => $branch->address,
            'telephone' => $branch->telephone,
        ));
    }
    public static function Delete($branch)
    {
        return $branch->delete();
    }
}