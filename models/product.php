<?php
class product{
    public int $id;
    public int $shade_id;
    public string $name;
    public float $price;
    public string $description;
    public int $quantity;

    public function __construct(int $id, int $shade_id, string $name, float $price, ?string $description, ?int $quantity){
        $this->id = $id;
		$this->$shade_id = $shade_id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description ?? "";
        $this->quantity = $quantity ?? 0;
    }
}
?>
