<?php

require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Instructor.class.php");
require_once("inc/Entity/Rating.class.php");
require_once("inc/Entity/Course.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/InstructorDAO.class.php");
require_once("inc/Utility/CourseDAO.class.php");
require_once("inc/Utility/RatingDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");

//session_start();
//We must get Instructor that user entered from the search Page!! Its just a basic example of how it's gonna work

RatingDAO::initialize();
$instructor = new Instructor();
$instructor->setInstructorID(1);
$instructor->setCourseID(1);
$instructor->setFirstName("Rahim");
$instructor->setLastName("Virani");
$instructor->setEmail("rahimvirani@douglascollege.ca");
$reviews = RatingDAO::getInstructorReviews($instructor);
CourseDAO::initialize();
$courses = CourseDAO::getInstructorCourse($instructor);
var_dump($courses);
var_dump($reviews);
Page::header();
Page::listProffesorReviews($instructor , $reviews, $courses);
Page::footer();
//LoginManager::verifyLogin();







?>