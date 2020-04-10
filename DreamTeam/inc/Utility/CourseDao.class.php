<?php



class CourseDAO  {

    //Static DB
    private static $_db;

    //Initialize the CourseDAO
    static function initialize()    {
        //Remember to send in the course name
        self::$_db=new PDOAgent('Course');
    }

    //Get all the courses
    static function getCourses() {
        $sql="SELECT * FROM Course ;";
       

        //Prepare the Query
        self::$_db->query($sql);

        self::$_db->execute();
        //Return the results
        
        //Return resultSet
        return self::$_db->resultSet();
    }
    static function getInstructorCourse(Instructor $instructor){
        $sql = "SELECT Course.CourseID, Course.CourseShortName, Course.CourseLongName FROM Course, Instructor_Course where Instructor_Course.InstructorID=:instructorid and Instructor_Course.CourseID = Course.CourseID;";
        self::$_db->query($sql);
        self::$_db->bind(":instructorid", $instructor->getInstructorID());
        self::$_db->execute();
        return self::$_db->getResultSet();
    }
}



?>