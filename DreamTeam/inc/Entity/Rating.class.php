<?php
class Rating{
// RatingID INT PRIMARY KEY AUTO_INCREMENT,
// InstructorID INT NOT NULL,
// Rating INT NOT NULL,
// Review VARCHAR(255),

private $RatingID;
private $InstructorID;
private $Rating;
private $Review;

//Setters
public function setRatingID(int $ratingID){
    $this->RatingID=$ratingID;
}
public function setInstructorID(int $instructorID){
    $this->InstructorID=$instructorID;
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
public function getRating():int{
    return $this->Rating;
}
public function getReview():string{
     return$this->Review;
}
}
?>