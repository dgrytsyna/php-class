<?php

class BasicHttpAuth
{
    private $fPath;

    private $accounts = [];

    public function __construct($filePath)
    {
        $this->fPath = $filePath;
        
        $this->loadAccounts();
    }

    public function add($email, $hash)
    {
        if(!$this->accountExists($email)) {
            $this->accounts[$email] = $hash; 
            return true;
        }

        return false;
    }

    public function accountExists($email)
    {
        if (is_array($this->accounts) && count($this->accounts) > 0) {
            return array_key_exists($email, $this->accounts);
        }
        return false;
        
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

    private function saveAccounts()
    {   
       // var_dump($this->accounts);
        $a = json_encode($this->accounts);
        return file_put_contents($this->fPath, $a);
    }

    function __destruct()
    {
       $this->saveAccounts();
    }

}



