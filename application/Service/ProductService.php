<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/CatalogueService.php';

class ProductService
{
    public static function GetAll()
    {
        return Product::find('all');
    }

    public static function GetById($productId)
    {
        return Product::find_by_product_id($productId);
    }
    public static function GetByName($productName)
    {
        return Product::find('all',array('name' => $productName));
    }
    public static function GetByPartialName($productName)
    {
        return Product::find('all',array('conditions' => 'name LIKE "%'.$productName.'%"'));
    }
    public static function Save($product)
    {
        $product->save();
    }

    public static function Create($product)
    {
        Product::create(array(
            'name' => $product->name,
            'price' => $product->price,
            'catalogue_id' => $product->catalogue_id,
            'description' => $product->description
        ));
    }

    public static function Delete($product)
    {
        $product->delete();
    }

    public static function GetBeetwenProduct($start, $step)
    {
        return Product::find('all',array('limit'=>$start.','.$step));
    }
    public static function  GetByCatalogue($catalogueName)
    {
        return Product::find('all',array('catalogue_id'=>CatalogueService::GetByName($catalogueName)->catalogue_id));
    }
}