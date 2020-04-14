<?php

require_once("inc/config.inc.php");
require_once("inc/Entity/Instructor.class.php");
require_once("inc/Entity/Rating.class.php");
require_once("inc/Entity/Course.class.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/RestClient.class.php");
require_once("inc/Utility/Page.class.php");

session_start();
LoginManager::verifyLogin();

Page::headerForProfessor();
$getDataForAutoFill = RestClient::call("GET");
Page::searchFormProfessor($getDataForAutoFill);
$student = $_SESSION["user"];
if (!empty($_GET)) {
    if (isset($_GET["action"]) && $_GET["action"] == "searchButton")    {
        $fullName = $_GET["search"];
        $errors = array();                
            if(strpos($fullName, ' ') !== false) {             
                $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $_GET["search"]));
                if ($jInstrucorReviewsAndCourses == null){
                    $errors[] = "Cannot Find Instructor, Try Again!";
                    Page::showErrorsList($errors);
                } else {
                $reviews = array();
                $courses = array(); 
                $instructor = new Instructor();
                $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
                if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
                }
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
                    $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                    }              
                    Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                    Page::ratingsForm($courses, $instructor); 
                }
                                            
            }
            else {  
                $errors[] = "Cannot Find Instructor, Please try again!"; 
            Page::showErrorsList($errors);                            
                //exit();
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
            $instructorName = $_POST['firstname']." ".$_POST['lastname'];
            $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $instructorName));         
            $reviews = array();
            $courses = array(); 
            $instructor = new Instructor();
            $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
            if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
            }
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
                $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                }                       
                Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                Page::ratingsForm($courses, $instructor);
            //Everyone call your alias as a dreamteam, otherwise you are gonna get an error!!           
            //header("Location: http://localhost/dreamteam/pro-dreamteam.php?search=" . $_POST["firstname"] . "+" . $_POST["lastname"]  . "&action=searchButton&searchButton=");
        }
    
    
    else if (isset($_POST["action"]) && $_POST["action"] == "ratingsEditButton"){
        $date = date("Y/m/d")  ;
            $postData = array(
                "InstructorID" => $_POST["instructorid"],
                "CourseID" => $_POST["courseNumber"],
                "Rating" => $_POST["ratingNumber"],
                "Review" => $_POST["experience"],
                "StudentID" => $student->getStudentID(),
                "RatingID" => $_POST["ratingID"],
                // "FirstName" => $student->getFirstName(),
                // "LastName" => $student->getLastName(),
                "Date" => $date
            );         
            RestClient::call("PUT", $postData);
            $instructorName = $_POST['firstname']." ".$_POST['lastname'];
            $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $instructorName));         
            $reviews = array();
            $courses = array(); 
            $instructor = new Instructor();
            $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
            if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
            }
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
                $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                }                                  
                Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                Page::ratingsForm($courses, $instructor);
    
    }
}

//when the delete button is clicked in panel
if (isset($_GET["action"]) && $_GET["action"] == "deleteButton"){     
    RestClient::call("DELETE", array('id' => $_GET['id']));
    $instructorName = $_GET['firstname']." ".$_GET['lastname'];
            $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $instructorName));         
            $reviews = array();
            $courses = array(); 
            $instructor = new Instructor();
            $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
            if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
            }
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
                $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                 }  
                                  
                Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                Page::ratingsForm($courses, $instructor);


}

//when the edit button is clicked in panel
if (isset($_GET["action"]) && $_GET["action"] == "editButton"){           
            $instructorName = $_GET['firstname']." ".$_GET['lastname'];
            $jInstrucorReviewsAndCourses = RestClient::call("GET", array('search' => $instructorName));         
            $reviews = array();
            $courses = array(); 
            $instructor = new Instructor();
            $instructor->setInstructorID($jInstrucorReviewsAndCourses[2]->InstructorID);
            if($jInstrucorReviewsAndCourses[2]->CourseID != null){
                $instructor->setCourseID($jInstrucorReviewsAndCourses[2]->CourseID); 
            }
            $instructor->setFirstName($jInstrucorReviewsAndCourses[2]->FirstName); 
            $instructor->setLastName($jInstrucorReviewsAndCourses[2]->LastName); 
            $instructor->setEmail($jInstrucorReviewsAndCourses[2]->Email);  
            $ratingObject = new Rating();            
            foreach ($jInstrucorReviewsAndCourses[0] as $jInstrucorReviewAndCourse){
                    $rating = new Rating();
                    $rating->setRatingID($jInstrucorReviewAndCourse->RatingID); 
                    if($jInstrucorReviewAndCourse->RatingID == $_GET["id"] ) {
                        $ratingObject->setRatingID($jInstrucorReviewAndCourse->RatingID);
                    }            
                    $rating->setInstructorID($jInstrucorReviewAndCourse->InstructorID);
                    $rating->setCourseID($jInstrucorReviewAndCourse->CourseID);
                    $rating->setStudentID($jInstrucorReviewAndCourse->StudentID);
                    $rating->setDate($jInstrucorReviewAndCourse->Date);
                    $rating->setReview($jInstrucorReviewAndCourse->Review);
                    if($jInstrucorReviewAndCourse->Review == $_GET["review"] ) {
                        $ratingObject->setReview($jInstrucorReviewAndCourse->Review);
                    }
                    $rating->setRating($jInstrucorReviewAndCourse->Rating);
                    if($jInstrucorReviewAndCourse->Rating == $_GET["rating"] ) {
                        $ratingObject->setRating($jInstrucorReviewAndCourse->Rating);
                    }
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
                $averageForInstructor = 0;       
                    if (sizeof($reviews) != 0){
                        $averageForInstructor = $totalRating / sizeof($reviews); 
                }  
                                  
                Page::reviewsSection($reviews, $averageForInstructor, $instructor);
                Page::editRatingsForm($courses, $instructor, $ratingObject);

}

Page::footerforProfessor();

?>