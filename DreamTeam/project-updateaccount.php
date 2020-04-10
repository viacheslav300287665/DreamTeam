<?php

//Require
require_once("inc/config.inc.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/StudentDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");

session_start();

//$_SERVER["REQUEST_METHOD"] == "POST" 
if (!empty($_POST)) { 
    if($_POST["action"] == "logout"){

        $test = $_SESSION['user'];
        header('Location: http://' . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']) .'/project-logout.php');
    }
    else if($_POST["action"] == "search"){

        $test = $_SESSION['user'];
        header('Location: http://' . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']) .'/project-logout.php');
        var_dump($_POST);
    }
    else if($_POST["action"] == "create"){

        $test = $_SESSION['user'];
        header('Location: http://' . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']) .'/project-logout.php');
    }
}
//Verify the Login
LoginManager::verifyLogin();

//Initialize the user DAO
StudentDAO::init();
//Get the current User thats logged in from the session
$currentUser = $_SESSION['user'];

Page::header();
Page::showSearchForm();
Page::footer();

?>
