<?php
require_once("inc/config.inc.php");
require_once("inc/Entity/Instructor.class.php");
require_once("inc/Entity/Rating.class.php");
require_once("inc/Entity/Course.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/InstructorDAO.class.php");
require_once("inc/Utility/CourseDAO.class.php");
require_once("inc/Utility/RatingDAO.class.php");
require_once("inc/Utility/StudentDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");

//Initialise the DAOs

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
//If someone clicked Edit
if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
    //Pull the section to Edit from the DAO
    $courseToEdit = CourseDAO::getCourse($_GET["id"]);
    
    //Render the  Edit Section form with the section to edit and  alist of the courses.
    Page::editCourseForm($courseToEdit);
}
//show
Page::header();
Page::listCourses(CourseDAO::getCourses());
Page::createCourseForm();
Page::footer();


?>