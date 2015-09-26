<?php
require_once __ROOT__.'/application/Service/AttributeService.php';
require_once __ROOT__.'/application/Helper/AttributeHelper.php';
require_once __ROOT__.'/application/Helper/PermissionHelper.php';
class Controller_Attribute extends Controller
{
    public function action_item()
    {
        PermissionHelper::Verification(__Viewer__, __CanCreate__);
        $model = AttributeHelper::PopulateAttributeViewModelList(AttributeService::GetAll());
        $this->view->generate('attributeItem_view.php', 'template_view.php', $model);
    }

    public function action_newFloat()
    {

    }

}