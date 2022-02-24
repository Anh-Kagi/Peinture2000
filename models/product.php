<?php
class Product{
    public  $id;
    public  $shade_id;
    public  $name;
    public  $price;
    public  $description;
    public  $quantity;

    public function __construct(int $id, int $shade_id, string $name, float $price, ?string $description, ?int $quantity){
        $this->id = $id;
		$this->shade_id = $shade_id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description ?? "";
        $this->quantity = $quantity ?? 0;
    }
}
?>