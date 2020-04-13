<?php

//Require Files
require_once("inc/config.inc.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/StudentDAO.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");


/**
 * To login-> UserName: cprydden0
 * Password: cprydden0
 */

 
//Check if the form was posted
if (!empty($_POST)) {


    //Initialize the DAO
    StudentDAO::init();
    //Get the current user 
    $currentUser = StudentDAO::getStudent($_POST['username']);
    //Check the DAO returned an object of type user
    if ($currentUser!=false) {
        //Check the password
        if ($currentUser->verifyPassword($_POST['password']))  {
        // if ( $currentUser->getUserName() == $_POST['password'])  {

            //Start the session
            session_start();
            //Set the user to logged in
            $_SESSION['user'] = $currentUser;
            if($currentUser->getUsername()=="admin"){
                header('Location: Admin-CRUD.php');
            }else{
            //Send the user to the user managment page Lab09SHi_56789-updateaccount.php
            header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .'/project-proffessor.php');
            }
        }

    }else{?>
        <script>
        alert("Enter valid username and password combination");
        </script>
    <?php }
}

//Set the age Title
Page::header();
Page::showLogin();
Page::footer();

?>
