<?php

require_once("inc/config.inc.php");
require_once("inc/Entity/Instructor.class.php");
require_once("inc/Entity/Rating.class.php");
require_once("inc/Entity/Course.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/InstructorDAO.class.php");
require_once("inc/Utility/CourseDAO.class.php");
require_once("inc/Utility/RatingDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");

//session_start();
//We must get Instructor that user entered from the search Page!! Its just a basic example of how it's gonna work

// RatingDAO::initialize();
// $instructor = new Instructor();
// $instructor->setInstructorID(1);
// $instructor->setCourseID(1);
// $instructor->setFirstName("Rahim");
// $instructor->setLastName("Virani");
// $instructor->setEmail("rahimvirani@douglascollege.ca");
// $reviews = RatingDAO::getInstructorReviews($instructor);
// CourseDAO::initialize();
// $courses = CourseDAO::getInstructorCourse($instructor);
// var_dump($courses);
// var_dump($reviews);
// Page::header();
// Page::listProffesorReviews($instructor , $reviews, $courses);
// Page::footer();
//LoginManager::verifyLogin();

Page::headerForProfessor();
Page::searchFormProfessor();

if (!empty($_POST)){
    if (isset($_POST["search"])){
        $fullName = $_POST["search"];
        $splitFullName = explode(" ", $fullName);
        $firstName = $splitFullName[0];
        $lastName = $splitFullName[1];
        $totalRating = 0;
        InstructorDAO::initialize();
        $instructor = InstructorDAO::getInstructorByName($firstName, $lastName);
        if ($instructor != null){
            RatingDAO::initialize();
            $reviews = RatingDAO::getInstructorReviews($instructor); 
            foreach ($reviews as $review){         
               $totalRating += $review->getRating(); 
            }
            $averageForInstructor = $totalRating / sizeof($reviews);
            CourseDAO::initialize();
            //$courses = CourseDAO::getInstructorCourse($instructor);
            //var_dump($courses);
            Page::reviewsSection($reviews, $averageForInstructor, $instructor);
            Page::ratingsForm();
        } else {
            //Show Error that $instructor is not found
        }
    }
}

//Follow this pattern to make it work right

//Page::reviewsSection();

Page::footerforProfessor();







?>