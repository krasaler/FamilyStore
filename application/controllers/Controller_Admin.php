<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 25.09.2015
 * Time: 18:31
 */
class Controller_Admin extends Controller
{
    public function action_index()
    {
        $this->view->generate('\Admin\adminMain_view.php', '\Admin\adminTemplate_view.php');
    }
    public function action_catalogueList()
    {
        $data = CatalogueService::GetAll();
        $this->view->generate('\Admin\adminMain_view.php', '\Admin\adminTemplate_view.php',$data);
    }
}