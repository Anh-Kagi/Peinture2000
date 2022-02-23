<?php
require_once('./utils/database.php');
require_once('./models/product.php');

class ProductService{
    public static function getAllProducts(){
		$products = array();
		foreach(Database::query("SELECT id, shade_id, name , price, description, quantity FROM product") as $row){
			$products[] = new Product($row["id"], $row["shade_id"], $row["name"], $row["price"], $row["description"], $row["quantity"]);
		}
		return $products;
    }
}
?>