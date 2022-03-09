<?php
require_once('./utils/database.php');
require_once('./models/product.php');

class ProductService
{
    public static function getAllProducts()
    {
        $products = array();
        foreach (Database::query("SELECT id, shade_id, name , price, description, quantity FROM product") as $row) {
            $products[] = new Product($row["id"], $row["shade_id"], $row["name"], $row["price"], $row["description"], $row["quantity"]);
        }
        return $products;
    }
    
    public static function getProductById($id)
    {
        $params = array();
        $params[':id'] = $id;
        foreach (Database::query("SELECT id, shade_id, name , price, description, quantity FROM product WHERE id = :id", $params) as $row) {
            $product = new Product($row["id"], $row["shade_id"], $row["name"], $row["price"], $row["description"], $row["quantity"]);
            return $product;
        }
    }
    
    public static function insertProduct($product)
    {
        $params = array();
        $params[':shade_id'] = $product->shade_id;
        $params[':name'] = $product->name;
        $params[':price'] = $product->price;
        $params[':description'] = $product->description;
        $params[':quantity'] = $product->quantity;
        Database::query("INSERT INTO product (shade_id, name , price, description, quantity) VALUES (:shade_id, :name , :price, :description, :quantity)", $params);
    }
    
    public static function updateProduct($product)
    {
        $params = array();
        $params[':id'] = $product->id;
        $params[':shade_id'] = $product->shade_id;
        $params[':name'] = $product->name;
        $params[':price'] = $product->price;
        $params[':description'] = $product->description;
        $params[':quantity'] = $product->quantity;
        Database::query("UPDATE product SET shade_id=:shade_id, name=:name , price=:price, description=:description, quantity=:quantity WHERE id=:id", $params);
    }
}
