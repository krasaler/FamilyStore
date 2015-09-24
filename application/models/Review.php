<?php

class Review extends ActiveRecord\Model
{
    public static $table_name='Review';
    public static $primary_key='review_id';
    public static $belongs_to=array(array('product'),array('account'));
}