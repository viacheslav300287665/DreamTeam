<?php

//Require
require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");

session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $test = $_SESSION['user'];
    header('Location: http://' . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']) .'/project-logout.php');
}
//Verify the Login
LoginManager::verifyLogin();

//Initialize the user DAO
UserDAO::init();
//Get the current User thats logged in from the session
$currentUser = $_SESSION['user'];

Page::header();
Page::showUserDetails($currentUser);
Page::footer();

?>