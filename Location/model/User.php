<?php
class User
{
    private $name;
    private $lastName;
    private $email;
    private $password;
    public function __construct($name, $lastName,
                                $email, $password)
    {
        $this->name = $name;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->password = $password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getLastname()
    {
        return $this->lastName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
}