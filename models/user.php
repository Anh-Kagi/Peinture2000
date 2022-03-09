<?php
class User
{
    public int $id;
    public string $name;
    private string $hash;

    public function __construct(int $id, string $name, string $password, bool $hash)
    {
        $this->id = $id;
        $this->name = $name;
        if ($hash) {
            $this->setPassword($password);
        } else {
            $this->hash = $password;
        }
    }

    public function setPassword(string $password)
    {
        $this->hash = hash("sha512", $password);
    }

    public function verifyPassword(string $password)
    {
        return hash("sha512", $password) === $this->hash;
    }

    public function getHash()
    {
        return $this->hash;
    }
}
