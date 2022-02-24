<?php
class User{
    public int $id;
    public string $name;
    private string $hash;

    public function __construct(int $id, string $name, string $hash){
        $this->id = $id;
        $this->name = $name;
        $this->hash = $hash;
    }

    public function setPassword(string $password) {
        $this->hash = hash("sha512", $password);
    }

    public function verifyPassword(string $password) {
        return hash("sha256", $password) === $this->hash;
    }
}
?>
