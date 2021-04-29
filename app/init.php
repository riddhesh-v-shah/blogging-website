<?php

session_start();

$app = __DIR__;

require_once "{$app}/classes/Hash.class.php";
require_once "{$app}/classes/ErrorHandler.class.php";
require_once "{$app}/classes/Validator.class.php";
require_once "{$app}/classes/Database.class.php";
require_once "{$app}/classes/Auth.class.php";
require_once "{$app}/classes/TokenHandler.class.php";
require_once "{$app}/classes/UserHelper.class.php";
require_once "{$app}/classes/MailConfigHelper.class.php";

$hash = new Hash();
$database = new Database();
$auth = new Auth($database, $hash);
$errorHandler = new ErrorHandler();
$validation = new Validator($database, $errorHandler);
$tokenHandler = new TokenHandler($database, $hash);
$userHelper = new UserHelper($database);
$mail = MailConfigHelper::getMailer();

$tokenHandler->build();

if(isset($_COOKIE['token']) && $tokenHandler->isValid($_COOKIE['token'], 1)){
    $token = $_COOKIE['token'];

    //If we want the user user_id
    $user = $tokenHandler->getBloggerFromValidToken($token);

    //die(var_dump($user->user_id));
    $auth->setAuthSession($user->blogger_id);

    /**
     * In this there are two possiblities of getting signed in
     * 
     * If cookie is set
     *      In this we have to check whether cookie is set or not it will it will be unset when seesion is deleted
     * 
     */

}

//$auth->build();

function dd($data){
    die(var_dump($data));
}

?>