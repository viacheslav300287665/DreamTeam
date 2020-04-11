<?php
class Rating{
    // RatingID INT PRIMARY KEY AUTO_INCREMENT,
    // InstructorID INT NOT NULL,
    // CourseID INT NOT NULL,
    // StudentID INT NOT NULL,
    // Date Date,
    // Rating INT NOT NULL,
    // Review VARCHAR(255),

private $RatingID;
private $InstructorID;
private $CourseID;
private $StudentID;
private $Date;
private $Rating;
private $Review;



//Setters
public function setRatingID(int $ratingID){
    $this->RatingID=$ratingID;
}
public function setInstructorID(int $instructorID){
    $this->InstructorID=$instructorID;
}
public function setCourseID(int $courseID){
    $this->CourseID=$courseID;
}
public function setStudentID(int $studentID){
    $this->StudentID=$studentID;
}
public function setDate(string $date){
    $this->Date=$date;
}
public function setRating(int $ratingID){
    $this->Rating=$rating;
}
public function setReview(string $review){
    $this->Review=$review;
}

//getters
public function getRatingID():int{
   return $this->RatingID;
}
public function getInstructorID():int{
    return $this->InstructorID;
}
public function getCourseID():int{
    return $this->CourseID;
}
public function getStudentID():int{
    return $this->StudentID;
}
public function getDate(){
    return $this->Date;
}
public function getRating() :int{
    return $this->Rating;
}
public function getReview():string{
     return$this->Review;
}
}
?>