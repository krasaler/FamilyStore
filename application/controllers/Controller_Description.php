<?php
class Controller_Description extends Controller
{
	function action_index()
	{

		$this->view->generate('description_view.php', 'template_view.php');
	}
}