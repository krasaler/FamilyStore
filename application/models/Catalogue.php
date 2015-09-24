<?php

class Catalogue extends ActiveRecord\Model
{
    public static $table_name='catalogue';
    public static $primary_key='catalogue_id';
    public static $has_many=array(array('products'));
}