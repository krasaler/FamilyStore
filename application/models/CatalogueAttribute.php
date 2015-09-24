<?php

class CatalogueAttribute extends ActiveRecord\Model
{
    public static $table_name='CatalogueAttribute';
    public static $primary_key='catalogueattribute_id';
    public static $belongs_to=array(array('attribute'),array('catalogue'));
}