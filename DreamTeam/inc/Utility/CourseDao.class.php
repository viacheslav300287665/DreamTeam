<?php



class CourseDAO  {

    //Static DB
    private static $_db;

    //Initialize the CourseDAO
    static function initialize()    {
        //Remember to send in the course name
        self::$_db=new PDOService('Course');
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
}



?>