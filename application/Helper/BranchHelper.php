<?php

require_once __ROOT__.'/application/ViewModel/BranchViewModel.php';
class BranchHelper
{
    public static function PopulateBranchViewModel($branch)
    {
        $model = new BranchViewModel();
        $model->id = $branch->branch_id;
        $model->name = $branch->name;
        $model->address = $branch->address;
        $model->telephone = $branch->telephone;
        return $model;
    }

    public static function PopulateBranchViewModelList($branchs)
    {
        for ($i=0;$i<count($branchs);$i++)
        {
            $models[$i] = BranchHelper::PopulateBranchViewModel($branchs[$i]);
        }
        return $models;

    }
}