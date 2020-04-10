<?php

Class Course    {
  
    // CourseID INT PRIMARY KEY AUTO_INCREMENT,
    // CourseShortName TINYTEXT NOT NULL,
    // CourseLongName TINYTEXT NOT NULL
    // //Attributes
    private $CourseID;
    private $CourseShortName;
    private $CourseLongName;

    //Setters
    public function setCourseID(int $courseID){
        $this->CourseID=$courseID;
    }
    public function setCourseShortName(string $shortName){
        $this->CourseShortName=$shortName;
    }
    public function setCourseLongName(string $longName){
        $this->CourseLongName=$longName;
    }

    //Getters 
    public function getCourseID():int{
        return $this->CourseID;
    }
    public function getCourseShortName():string{
        return $this->CourseShortName;
    }
    public function getLongShortName():string{
        return $this->CourseLongName;
    }

}

?>