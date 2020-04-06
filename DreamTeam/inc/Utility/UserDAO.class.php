<?php

class UserDAO   {

    //Store the PDO agent here.
    private static $_db;

    static function init()  {
        //Initialize the internal PDO Agent
        self::$_db = new PDOAgent('User');
    }

    //Get the user
    static function getUser(string $userName)  {
        $sql = "SELECT * FROM Users
        where username = :userName;";

        //QUERY!!
        self::$_db->query($sql);
        //BIND
        self::$_db->bind(":userName",$userName);
        //EXECUTE!!
        self::$_db->execute();
        //RETURN
        return self::$_db->singleResult();

    }

    static function getUsers()  {
        $sql = "SELECT * FROM Users;";

        //QUERY!!
        self::$_db->query($sql);
        //BIND BUT THERE ARE NONE
        //EXECUTE!!
        self::$_db->execute();
        //RETURN
        return self::$_db->resultSet();

    }
    
    
}