<?php

require_once("inc/config.inc.php");
require_once("inc/Entity/Instructor.class.php");
require_once("inc/Entity/Rating.class.php");
require_once("inc/Entity/Course.class.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/InstructorDAO.class.php");
require_once("inc/Utility/StudentDAO.class.php");
require_once("inc/Utility/CourseDAO.class.php");
require_once("inc/Utility/RatingDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");

session_start();
LoginManager::verifyLogin();

Page::headerForProfessor();
Page::searchFormProfessor();
$student = $_SESSION["user"];
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
                    $courses = CourseDAO::getInstructorCourse($instructor);
                    Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                    Page::ratingsForm($courses, $instructor);
                }else {
                    //Show Error that $instructor is not found
                    throw new Exception("Problem parsing the name, please check ");
                    //Page::footerforProfessor();
                    exit();
                }
            }
            else {
                // not explodable
                Page::footerforProfessor();
                exit();
            }
    }
    else if (isset($_POST["action"]) && $_POST["action"] == "ratingsButton"){
        $rating = new Rating();
        $rating->setInstructorID($_POST["instructorid"]);
        $rating->setCourseID($_POST["courseNumber"]);
        $rating->setStudentID($student->getStudentID());
        $date = date('Y/m/d');
        $rating->setDate($date);
        //var_dump($_POST["ratingNumber"]);
        $rating->setRating($_POST["ratingNumber"]);
        $rating->setReview($_POST["experience"]);      
        RatingDAO::initialize();
        RatingDAO::createRating($rating);
        $totalRating = 0;
        InstructorDAO::initialize();
        $instructor = InstructorDAO::getInstructorByName($_POST["firstname"], $_POST["lastname"]);
        $reviews = RatingDAO::getInstructorReviews($instructor); 
         foreach ($reviews as $review){         
        $totalRating += $review->getRating(); 
        }
        $averageForInstructor = $totalRating / sizeof($reviews);
        CourseDAO::initialize();
        $courses = CourseDAO::getInstructorCourse($instructor);
        Page::reviewsSection($reviews, $averageForInstructor, $instructor);
        Page::ratingsForm($courses, $instructor);
    }
    else if (isset($_POST["action"]) && $_POST["action"] == "ratingsEditButton"){
        $rating = new Rating();
        $rating->setRatingID($_POST["ratingID"]);
        $rating->setInstructorID($_POST["instructorid"]);
        $rating->setCourseID($_POST["courseNumber"]);
        $rating->setStudentID($student->getStudentID());
        $date = date('Y/m/d');
        $rating->setDate($date);
        //var_dump($_POST["ratingNumber"]);
        $rating->setRating($_POST["ratingNumber"]);
        $rating->setReview($_POST["experience"]);      
        RatingDAO::initialize();
        RatingDAO::updateRating($rating);
        $totalRating = 0;
        InstructorDAO::initialize();
        $instructor = InstructorDAO::getInstructorByName($_POST["firstname"], $_POST["lastname"]);
        $reviews = RatingDAO::getInstructorReviews($instructor); 
         foreach ($reviews as $review){         
        $totalRating += $review->getRating(); 
        }
        $averageForInstructor = $totalRating / sizeof($reviews);
        CourseDAO::initialize();
        $courses = CourseDAO::getInstructorCourse($instructor);
        Page::reviewsSection($reviews, $averageForInstructor, $instructor);
        Page::ratingsForm($courses, $instructor);
    
    }

}
//when the delete button is clicked in panel
if (isset($_GET["action"]) && $_GET["action"] == "deleteButton"){     
    RatingDAO::initialize();
    RatingDAO::deleteRating($_GET["id"]);
    $totalRating = 0;
    InstructorDAO::initialize();
    $instructor = InstructorDAO::getInstructorByName($_GET["firstname"], $_GET["lastname"]);
    $reviews = RatingDAO::getInstructorReviews($instructor); 
     foreach ($reviews as $review){         
    $totalRating += $review->getRating(); 
    }
    $averageForInstructor = $totalRating / sizeof($reviews);
    CourseDAO::initialize();
    $courses = CourseDAO::getInstructorCourse($instructor);
    Page::reviewsSection($reviews, $averageForInstructor, $instructor);
    Page::ratingsForm($courses, $instructor);

}

//when the edit button is clicked in panel
if (isset($_GET["action"]) && $_GET["action"] == "editButton"){           
        RatingDAO::initialize();
        $rating = RatingDAO::getRating($_GET["id"]);
        $totalRating = 0;
        InstructorDAO::initialize();
        $instructor = InstructorDAO::getInstructorByName($_GET["firstname"], $_GET["lastname"]);
        $reviews = RatingDAO::getInstructorReviews($instructor); 
         foreach ($reviews as $review){         
        $totalRating += $review->getRating(); 
        }
        $averageForInstructor = $totalRating / sizeof($reviews);
        CourseDAO::initialize();
        $courses = CourseDAO::getInstructorCourse($instructor);
        Page::reviewsSection($reviews, $averageForInstructor, $instructor);
        Page::editRatingsForm($courses, $instructor, $rating);

}
Page::footerforProfessor();







?>