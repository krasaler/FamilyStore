<?php

require_once __ROOT__ . '/application/ViewModel/StatusEditOrderViewModel.php';
require_once __ROOT__ . '/application/Service/StatusService.php';
class StatusHelper
{
    public static function PopulateStatusViewModel($orderId)
    {
        $model = new StatusEditOrderViewModel();
        $model->orderId = $orderId;
        $statuss = StatusService::GetAll();
        for($i=0;$i<count($statuss);$i++) {
            $model->names[$i] = $statuss[$i]->name;
            }
        return $model;
    }
}