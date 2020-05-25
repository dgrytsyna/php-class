<?php
class Valid{
    private $email;
    private $password;
    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }
    public function validateEmail(){
       return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
    public function validatePassword(){
        return filter_var($this->password, FILTER_DEFAULT);
    } 
}