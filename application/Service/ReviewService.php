<?php

class ReviewService
{
    public static function GetAll()
    {
        return Review::find('all');
    }
    public static function GetById($reviewId)
    {
        return Review::find(array('review_id'=>$reviewId));
    }
    public static function GetByProductId($productId)
    {
        return Review::find('all',array('product_id'=>$productId));
    }
    public static function Save($review)
    {
        $review->save();
    }
    public static function Create($review)
    {
        Review::create(array(
            'value' => $review->value,
            'product_id' => $review->product_id,
            'account_id' => $review->account_id
        ));
    }
    public static function Delete($review)
    {
        $review->delete();
    }
}