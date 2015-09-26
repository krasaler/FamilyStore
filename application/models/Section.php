<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 26.09.2015
 * Time: 14:44
 */
class Section extends ActiveRecord\Model
{
    public static $table_name='section';
    public static $primary_key='section_id';
    static $has_many = array(
        array('catalogues')
    );
}