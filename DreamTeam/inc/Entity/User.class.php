<?php
/*
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
*/

class User {

    //Attributes
    private $id;
    private $first_name;
    private $last_name;
    private $username;
    private $email;
    private $phone;
    private $gender;
    private $age;
    private $password;

    //Getters
    public function getID(): int{
        return $this->id;
    }
    public function getFirstName(): string{
        return $this->first_name;
    }
    public function getLastName(): string{
        return $this->last_name;
    }
    public function getUserName(): string{
        return $this->username;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getPhone(): string{
        return $this->phone;
    }
    public function getGender(): string{
        return $this->gender;
    }
    public function getAge(): int{
        return $this->age;
    }
    public function getPassword(): string{
        return $this->password;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify) {
        //Return a boolean based on verifying if the password given is correct for the current user
        if($this->password == $passwordToVerify){
            return true;
        }
        else{
            return false;
        }
        
    }
}



?>