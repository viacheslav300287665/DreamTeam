<?php

require_once("inc/config.inc.php");
require_once("inc/Entity/Instructor.class.php");
require_once("inc/Entity/Rating.class.php");
require_once("inc/Entity/Course.class.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/LoginManager.class.php");
//require_once("inc/Utility/PDOService.class.php");
//require_once("inc/Utility/InstructorDAO.class.php");
//require_once("inc/Utility/StudentDAO.class.php");
//require_once("inc/Utility/CourseDAO.class.php");
//require_once("inc/Utility/RatingDAO.class.php");
require_once("inc/Utility/RestClient.class.php");
require_once("inc/Utility/Page.class.php");

session_start();
LoginManager::verifyLogin();

Page::headerForProfessor();
Page::searchFormProfessor();
$student = $_SESSION["user"];
if (!empty($_GET)) {
    if (isset($_GET["action"]) && $_GET["action"] == "searchButton")    {
        $fullName = $_GET["search"];       
            if(strpos($fullName, ' ') !== false) {             
                $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $_GET["search"]));         
                $reviews = array();
                $courses = array(); 
                $instructor = new Instructor();
                $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
                $instructor->setFirstName($jInstrucorReviewsAndCourses[2]->FirstName); 
                $instructor->setLastName($jInstrucorReviewsAndCourses[2]->LastName); 
                $instructor->setEmail($jInstrucorReviewsAndCourses[2]->Email);              
                foreach ($jInstrucorReviewsAndCourses[0] as $jInstrucorReviewAndCourse){
                        $rating = new Rating();
                        $rating->setRatingID($jInstrucorReviewAndCourse->RatingID)  ;              
                        $rating->setInstructorID($jInstrucorReviewAndCourse->InstructorID);
                        $rating->setCourseID($jInstrucorReviewAndCourse->CourseID);
                        $rating->setStudentID($jInstrucorReviewAndCourse->StudentID);
                        $rating->setDate($jInstrucorReviewAndCourse->Date);
                        $rating->setReview($jInstrucorReviewAndCourse->Review);
                        $rating->setRating($jInstrucorReviewAndCourse->Rating);
                        $rating->setFirstName($jInstrucorReviewAndCourse->FirstName);
                        $rating->setLastName($jInstrucorReviewAndCourse->LastName);  
                        $rating->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);               
                        $reviews[] = $rating;                    
                }             
                foreach($jInstrucorReviewsAndCourses[1] as $jInstrucorReviewAndCourse){
                    $course = new Course();
                    $course->setCourseID($jInstrucorReviewAndCourse->CourseID);
                    $course->setCourseShortName($jInstrucorReviewAndCourse->CourseShortName);
                    $course->setCourseLongName($jInstrucorReviewAndCourse->CourseLongName);
                    $courses[] = $course;                    
                }                                     
                $totalRating = 0;                            
                    foreach ($reviews as $review){         
                        $totalRating += $review->getRating(); 
                    }
                    $averageForInstructor = $totalRating / sizeof($reviews);
                                      
                    Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                    Page::ratingsForm($courses, $instructor);           
                    }
            else {                
             Page::footerforProfessor();
                exit();
           }
         }
    }
    if (!empty($_POST)){
        if (isset($_POST["action"]) && $_POST["action"] == "ratingsButton"){  
            $date = date("Y/m/d")  ;
            $postData = array(
                "InstructorID" => $_POST["instructorid"],
                "CourseID" => $_POST["courseNumber"],
                "Rating" => $_POST["ratingNumber"],
                "Review" => $_POST["experience"],
                "StudentID" => $student->getStudentID(),
                "Date" => $date
            );         
            RestClient::call("POST", $postData);
            //Everyone call your alias as a dreamteam, otherwise you are gonna get an error!!           
            header("Location: http://localhost/dreamteam/project-proffessor.php?search=" . $_POST["firstname"] . "+" . $_POST["lastname"]  . "&action=searchButton&searchButton=");
        }
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