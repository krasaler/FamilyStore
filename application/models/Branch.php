<?php


class Branch extends ActiveRecord\Model
{
    public static $table_name='branch';
    public static $primary_key='branch_id';
    static $has_many = array(
        array('Orders')
    );
}