<?php
require_once __ROOT__.'/application/ViewModel/ReviewViewModel.php';
require_once __ROOT__.'/application/Helper/ProductHelper.php';
require_once __ROOT__.'/application/Service/ProductService.php';
require_once __ROOT__.'/application/Helper/AccountHelper.php';
require_once __ROOT__.'/application/Service/AccountService.php';
class ReviewHelper
{
    public static function PopulateReviewViewModel($review)
    {
        $model = new ReviewViewModel();
        $model->id = $review->review_id;
        $model->product = ProductHelper::PopulateProductViewModel(ProductService::GetById($review->product_id));
        $model->account = AccountHelper::PopulateAccountViewModel(AccountService::GetById($review->account_id));
        $model->value = $review->value;
        return $model;
    }

    public static function PopulateReviewViewModelList($reviews)
    {
        for ($i=0;$i<count($reviews);$i++)
        {
            $models[$i] = ReviewHelper::PopulateReviewViewModel($reviews[$i]);
        }
        return $models;

    }
}