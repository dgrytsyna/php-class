<?php
class Login{
    private $fPath;

    private $accounts = [];

    public function __construct($filePath)
    {
        $this->fPath = $filePath;
        
        $this->loadAccounts();
    }
    private function loadAccounts()
    {
        // read account from storage "database"
        $this->accounts = json_decode(
            file_get_contents(
                $this->fPath
            ), JSON_OBJECT_AS_ARRAY
        );
    }
    public function login($email, $password){
       if($this->accountExists($email) && $this->passVerify($password, $email)){
        echo "You logged in";
       }
    }
    
    public function passVerify($password, $email){
        return password_verify($password, $this->accounts[$email]);
    }
    public function accountExists($email)
    {
        if (is_array($this->accounts) && count($this->accounts) > 0) {
            return array_key_exists($email, $this->accounts);
        }
        return false;
        
    }
}