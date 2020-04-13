<?php
require_once("inc/config.inc.php");
require_once("inc/Entity/Instructor.class.php");
require_once("inc/Entity/Rating.class.php");
require_once("inc/Entity/Course.class.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/InstructorDAO.class.php");
require_once("inc/Utility/CourseDAO.class.php");
require_once("inc/Utility/RatingDAO.class.php");
require_once("inc/Utility/StudentDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");

//Initialise the DAOs
session_start();
$user=$_SESSION['user'];
if(LoginManager::verifyLogin() && $user->getUsername()=="admin")
{

CourseDAO::initialize();
InstructorDAO::initialize();
StudentDAO::init();
RatingDAO::initialize();

//Create 
if (!empty($_POST)) {
    if ($_POST["action"] == "create")    {
        //Assemble the Section to Insert
         
        $newCourse = new Course();
        //Send the section to the DAO for insertion
        $newCourse->setCourseShortName($_POST["courseshortname"]);
        $newCourse->setCourseLongName($_POST["courselongname"]);
        
        //Send the section to the DAO to be created
        CourseDAO::createCourse($newCourse);
    }else if ($_POST["action"] == "edit"){
        //Assemble the Section to Insert
         
        $editCourse = new Course();
        //Send the section to the DAO for insertion
        $editCourse->setCourseID($_POST["courseid"]);
        $editCourse->setCourseShortName($_POST["courseshortname"]);
        $editCourse->setCourseLongName($_POST["courselongname"]);
        
        //Send the section to the DAO to be created
        CourseDAO::updateCourse($editCourse);

    }

}//If there was a delete that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
    //Call the DAO and delete the respecitve Section
    CourseDAO::deleteCourse($_GET["id"]);
}

///////////////////////////////////////////////////////
////////////////////instructors////////////////////////
///////////////////////////////////////////////////////

if (!empty($_POST)) {
    if ($_POST["action"] == "createinstructor")    {
        //Assemble the Section to Insert
         
        $newInstructor = new Instructor();
        //Send the section to the DAO for insertion
        $newInstructor->setCourseID($_POST["courseid"]);
        $newInstructor->setFirstName($_POST["instructorfirstname"]);
        $newInstructor->setLastName($_POST["instructorlastname"]);
        $newInstructor->setEmail($_POST["instructoremail"]);
        
        //Send the section to the DAO to be created
        InstructorDAO::createInstructor($newInstructor);
    }else if ($_POST["action"] == "editinstructor"){
        //Assemble the Section to Insert
         
        $newInstructor = new Instructor();
        //Send the section to the DAO for insertion
        $newInstructor->setCourseID($_POST["courseid"]);
        $newInstructor->setFirstName($_POST["instructorfirstname"]);
        $newInstructor->setLastName($_POST["instructorlastname"]);
        $newInstructor->setEmail($_POST["instructoremail"]);
        $newInstructor->setInstructorID($_POST["instructorid"]);
        
        //Send the section to the DAO to be created
        InstructorDAO::updateInstructor($newInstructor);

    }
}
if (isset($_GET["action"]) && $_GET["action"] == "deleteinstructor")  {
    //Call the DAO and delete the respecitve Section
    InstructorDAO::deleteInstructor($_GET["id"]);
}
if (isset($_GET["action"]) && $_GET["action"] == "deletestudent")  {
    //Call the DAO and delete the respecitve Section
    StudentDAO::deleteStudent($_GET["id"]);
}

//show
Page::headerForAdminCRUD();
Page::listCourses(CourseDAO::getCourses());
//If someone clicked Edit
if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
    //Pull the section to Edit from the DAO
    $courseToEdit = CourseDAO::getCourse($_GET["id"]);
    
    //Render the  Edit Section form with the section to edit and  alist of the courses.
    Page::editCourseForm($courseToEdit);
}

Page::createCourseForm();
Page::listInstructors(InstructorDAO::getInstructors());
if (isset($_GET["action"]) && $_GET["action"] == "editinstructor")  {
    //Pull the section to Edit from the DAO
    $instructorToEdit = InstructorDAO::getInstructor($_GET["id"]);
    
    //Render the  Edit Section form with the section to edit and  alist of the courses.
    Page::editInstructorForm($instructorToEdit,CourseDAO::getCourses());
}   
Page::createInstructorForm(CourseDAO::getCourses());

Page::listStudents(StudentDAO::getUsers());
Page::footerForAdminCRUD();
}else
{
    session_destroy();
    header("Location: project-login.php");
}


?>