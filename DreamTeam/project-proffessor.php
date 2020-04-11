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

session_start();
LoginManager::verifyLogin();

Page::headerForProfessor();
Page::searchFormProfessor();

if (!empty($_POST)){
    //if (isset($_POST["search"])){
    if (isset($_POST["action"]) && $_POST["action"] == "searchButton")    {
        $fullName = $_POST["search"];

            if(strpos($fullName, ' ') !== false) {
                // explodable
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
                }else {
                    //Show Error that $instructor is not found
                    throw new Exception("Problem parsing the name, please check ");
                    Page::footerforProfessor();
                    exit();
                }
            }
            else {
                // not explodable
                Page::footerforProfessor();
                exit();
            }
    }
}

//Page::reviewsSection();

Page::footerforProfessor();







?>