<?php


//Require configuration
require_once('inc/config.inc.php');

//Require Entities
require_once('inc/Entity/Course.class.php');
require_once('inc/Entity/Instructor.class.php');
require_once('inc/Entity/Rating.class.php');
require_once('inc/Entity/Student.class.php');

//Require Utillity Classes
require_once('inc/Utility/PDOService.class.php');
require_once('inc/Utility/CourseDAO.class.php');
require_once('inc/Utility/InstructorDAO.class.php');
require_once('inc/Utility/RatingDAO.class.php');
require_once('inc/Utility/StudentDAO.class.php');

/*
Create  - INSERT - POST
Read    - SELECT - GET
Update  - UPDATE - PUT
DELETE  - DELETE - DELETE
*/

//Instantiate a new Customer Mapper

//Pull the request data
// parse_str(file_get_contents('php://input'), $requestData);
$requestData = json_decode(file_get_contents('php://input'));


//Do something based on the request
switch ($_SERVER["REQUEST_METHOD"])   {

    case "POST":    //Picked up a POST, Its Insert time!
    //YARC Id=6&Name=Sally Hill&City=Vancouver&Address=66 Royal Ave
    RatingDAO::initialize();
    //New Rating

    $rating = new Rating();
    $rating->setInstructorID($requestData->InstructorID);
    $rating->setCourseID($requestData->CourseID);
    $rating->setRating($requestData->Rating);
    $rating->setReview($requestData->Review);
    $rating->setStudentID($requestData->StudentID);
    $rating->setDate($requestData->Date);
      
    $result = RatingDAO::createRating($rating);
    header('Content-Type: application/json');
    echo json_encode($result);

    break;

    //If there was a request with an id return that customer, if not return all of them!
    case "GET":

      //  if (isset($requestData->id))    {

            //Return the customer object
         //   $sc = CustomerMapper::getCustomer($requestData->id);

            //Set the header
       //     header('Content-Type: application/json');
            //Barf out the JSON version
       //     echo json_encode($sc->jsonSerialize());

       // } else {
            //All the customers!
            if (isset($requestData->search)){
                InstructorDAO::initialize();
                $splitFullName = explode(" ", $requestData->search);
                $firstName = $splitFullName[0];
                $lastName = $splitFullName[1];
                $instructor = InstructorDAO::getInstructorByName($firstName, $lastName);
                RatingDAO::initialize();
                $ratings = RatingDAO::getInstructorReviews($instructor);                
                CourseDAO::initialize();
                $courses = CourseDAO::getInstructorCourse($instructor);
            //Walk the customers and add them to a serialized array to return.
            $serializedRatings = array();
            $serializedCourses = array();
            $serializedInstructor;
            foreach ($ratings as $rating){
                $serializedRatings[] = $rating->jsonSerialize();         
            }
            foreach ($courses as $course)    {
                $serializedCourses[] = $course->jsonSerialize();
            }       
            $serializedInstructor = $instructor->jsonSerialize();
            //Return the results
            //Set the header
            header('Content-Type: application/json');
            //Return the entire array
            $myJSON[] = $serializedRatings; 
            $myJSON[] = $serializedCourses;
            $myJSON[] = $serializedInstructor;
            echo json_encode($myJSON);
            }                    
    break;
   
    case "PUT":
        RatingDAO::initialize();
        //Update Rating
        $rating = new Rating();
        $rating->setInstructorID($requestData->InstructorID);
        $rating->setCourseID($requestData->CourseID);
        $rating->setRating($requestData->Rating);
        $rating->setReview($requestData->Review);
        $rating->setStudentID($requestData->StudentID);
        $rating->setDate($requestData->Date);
        $rating->setRatingID($requestData->RatingID);
        
        $result = RatingDAO::updateRating($rating);
        header('Content-Type: application/json');
        echo json_encode($result);

    break;

    case "DELETE":
        //In YARC send the request as key=value
        //Pull the ID, send it to delete via the customer mapper and return the result.
        // $result = CustomerMapper::deleteCustomer($requestData->id);
        RatingDAO::initialize();
        $result = RatingDAO::deleteRating($requestData->id);
        //Set the header
        header('Content-Type: application/json');
        //return the confirmation of deletion
        echo json_encode($result);
        

    break; 

    default:
        echo json_encode(array("message"=> "Você fala HTTP?"));
    break;
}


?>