<?php

namespace QI\SistemaDeChamados\Model;

class Cadastro{
    private $id;
    private $email;
    private $password;

    /**
     * This method create a new User object
     * @param string $email
     */
    public function __construct($email){
        $this->email = $email;
    }

    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }
}