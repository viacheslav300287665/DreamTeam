<?php

//Require Files
require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");


/**
 * To login-> UserName: cprydden0
 * Password: cprydden0
 */

 
//Check if the form was posted
if (!empty($_POST)) {


    //Initialize the DAO
    UserDAO::init();
    //Get the current user 
    $currentUser = UserDAO::getUser($_POST['username']);
    //Check the DAO returned an object of type user

        //Check the password
       // if ($authUser->verifyPassword($_POST['password']))  {
        if ( $currentUser->getUserName() == $_POST['password'])  {

            //Start the session
            session_start();
            //Set the user to logged in
            $_SESSION['user'] = $currentUser;

            //Send the user to the user managment page Lab09SHi_56789-updateaccount.php
            header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .'/project-updateaccount.php');
        }
}

//Set the age Title
Page::header();
Page::showLogin();
Page::footer();

?>
