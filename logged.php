<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
date_default_timezone_set("Europe/Kiev");
 

define('ACCOUNTS_FILE', 'db.json');

require_once 'Valid.php';
require_once 'Login.php';

$login = new Login(sprintf("%s/%s", __DIR__, ACCOUNTS_FILE));
$is_validated = new Valid($_POST['email'], $_POST['password']);
$email = $is_validated->validateEmail();
if (!$email) {
    echo "Wrong user email";
    require_once 'login-form.php';
    exit;
};
$password = $is_validated->validatePassword();
if (empty($password) || mb_strlen($password) < 10) {
    echo "Wrong or empty user password";
    require_once 'login-form.php';
    exit;
};
if(!$login->accountExists($email)){
    echo"You haven't been registred";
    require_once 'login-form.php';
    exit;
}
if(!$login->passVerify($password, $email)){
    echo "Sorry, wrong password";
    require_once 'login-form.php';
    exit;
}

$login->login($email,
$password);