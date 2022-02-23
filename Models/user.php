<?php
class User{
    public int $id;
    public string $name;
    public string $hash;

    public function __construct(int $id, string $name, string $hash){
        $this->id = $id;
        $this->name = $name;
        $this->hash = $hash;
    }
}
?>
