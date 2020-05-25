<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
date_default_timezone_set("Europe/Kiev");
 

define('ACCOUNTS_FILE', 'db.json');

require_once __DIR__.'\BasicHttpAuth.php';
require_once 'Valid.php';


// Create an instance of the our class.
$auth = new BasicHttpAuth( sprintf("%s/%s", __DIR__, ACCOUNTS_FILE)); 
$is_validated = new Valid($_POST['email'], $_POST['password']);
$email = $is_validated->validateEmail();
if (!$email) {
    echo "Wrong user email";
   include_once 'register.php';
    exit;
};
$password = $is_validated->validatePassword();
if (empty($password) || mb_strlen($password) < 10) {
    echo "Wrong or empty user password";
    include_once 'register.php';
    exit;
};
$passHash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

if (false === $passHash) {
    echo "System error occured...";
    include_once 'register.php';
    exit;
}
if($auth->accountExists($email)){
    echo "User with this email has been registred";
    include_once 'register.php';
    exit;
};
 $auth->add(
        $email,
        $passHash
    );
  header("Location: login-form.php");

 


// echo "<pre>";
// var_dump($auth);
// echo "</pre>";

// $auth->add(
//     'marie@gmail.com',
//     password_hash('qwerty', PASSWORD_DEFAULT)
// );
