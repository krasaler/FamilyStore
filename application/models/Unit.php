<?php

class Unit extends ActiveRecord\Model
{
    public static $table_name = 'unit';
    public static $primary_key='unit_id';
	static $has_many = array(
		array('attributes'));
}