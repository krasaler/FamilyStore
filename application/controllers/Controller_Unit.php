<?php

require_once __ROOT__.'/application/Service/UnitService.php';
class Controller_Unit extends Controller
{
    function action_Create()
    {
        $this->view->generate('/Unit/create_view.php', 'template_view.php');
    }
    function action_new()
    {
        $name = $_POST['inputName'];
        $unit = new Unit();
        $unit->name = $name;
        UnitService::Create($unit);
        header("Location: /Unit/Item");
    }
    function action_Edit()
    {
        $unit_id = $_GET['id'];
        $model = UnitService::GetById($unit_id);
        $this->view->generate('/Unit/edit_view.php', 'template_view.php',$model);
    }
    function action_Update()
    {
        $unit_id = $_POST['id'];
        $unit_name = $_POST['inputName'];
        $unit = UnitService::GetById($unit_id);
        $unit->name = $unit_name;
        UnitService::Save($unit);
        header("Location: /Unit/Item");
    }
    function action_Item()
    {
        $model = UnitService::GetAll();
        $this->view->generate('/Unit/item_view.php', 'template_view.php',$model);
    }

    function action_detail()
    {
        $unit_id = $_GET['id'];
        $model = UnitService::GetById($unit_id);
        $this->view->generate('/Unit/detail_view.php', 'template_view.php',$model);
    }
    function action_Remove()
    {
        $unit_id = $_GET['id'];
        $unit = UnitService::GetById($unit_id);
        UnitService::Delete($unit);
        header("Location: /Unit/item");
    }
}