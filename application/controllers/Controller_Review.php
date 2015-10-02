<?php
require_once __ROOT__.'/application/Service/ReviewService.php';
require_once __ROOT__.'/application/Helper/ReviewHelper.php';
class Controller_Review extends Controller
{
    public function action_item()
    {
        PermissionHelper::Verification('Editor');
        $model = ReviewHelper::PopulateReviewViewModelList(ReviewService::GetAll());
        $this->view->generate('/Review/item_view.php', 'template_view.php', $model);
    }
    public function action_remove()
    {
        PermissionHelper::Verification('Editor');
        $id = $_GET['id'];
        $review = ReviewService::GetById($id);
        ReviewService::Delete($review);
        header("Location: /Review/item");
    }
    public function action_thanks()
    {
        $this->view->generate('/Review/thanks_view.php', 'template_view.php');
    }

}